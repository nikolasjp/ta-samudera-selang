<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courier;
use App\Models\Province;
use App\Models\City;
use App\Models\DetailPesananModel;
use App\Models\KeranjangModel;
use App\Models\PesananModel;
use App\Models\UserModelProduk;
use DateTime;
use GuzzleHttp\Promise\Create;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutController extends Controller
{
    public function beli_produk($id_produk)
    {
        $produk_hose = UserModelProduk::find($id_produk);
        $couriers = Courier::pluck('title', 'code');
        $provinces = Province::pluck('title', 'province_id');
        return view('user.beli_produk.beli_produk', ['produk_hose' => $produk_hose], compact('couriers', 'provinces'));
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('title', 'city_id');
        return json_encode($city);
    }

    public function checkout(Request $request, $id_produk)
    {
        $data = $request->session()->all();
        if (count($data) >= 4) {
            $produk_hose = UserModelProduk::find($id_produk);
            $cost = RajaOngkir::ongkosKirim([
                'origin' => $request->city_origin,
                'originType' => "city",
                'destination' => $request->city_destination,
                'destinationType' => "city",
                'weight' => $_POST['quantity'] * $produk_hose->berat * 1000,
                'courier' => $request->courier,
            ])->get();
            $user_id = $request->session()->get('data_user')[0]['id'];
            $data_query = [
                'quantity' => $_POST['quantity'],
                'detail_alamat' => $_POST['detail_alamat'],
                'total_harga' => $_POST['quantity']  * $produk_hose->harga + $cost[0]['costs'][0]['cost'][0]['value'],
            ];
            $request->session()->put('confirm-user-' . $user_id, ['produk_hose' => $produk_hose, 'cost' => $cost, 'data_query' => $data_query]);
            if (count($cost[0]["costs"]) == 0) {
                return back()->with("gagal", "*Destinasi Pengiriman Paket Tidak Tersedia");
            } else {
                return view('user.beli_produk.checkout', ['produk_hose' => $produk_hose])->with('cost', $cost);
            }
        } else {
            return redirect('/login');
        }
    }

    public function checkout_keranjang(Request $request, $user_id)
    {
        $request->session()->all();
        $keranjang = KeranjangModel::where('user_id', $user_id)->get();
        // $cek_pesanan_harga = DetailPesananModel::where('user_id', $user_id)->get();
        $total_berat = [];

        $harga_pesanan = [];
        // dd($keranjang);
        foreach ($keranjang as $item) {
            array_push($total_berat, intval($item->berat));
            array_push($harga_pesanan, intval($item->harga));
        }
        /**
         * @param int $number
         * @return string
         */
        function rome($number)
        {
            $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
            $returnValue = '';
            while ($number > 0) {
                foreach ($map as $roman => $int) {
                    if ($number >= $int) {
                        $number -= $int;
                        $returnValue .= $roman;
                        break;
                    }
                }
            }
            return $returnValue;
        }

        function generateInvoice($datetime)
        {
            $date = $datetime;
            $datefull = date('Ymd', $date->timestamp);
            $year = rome(intval(substr(date('Y', $date->timestamp), 1)));
            $month = rome(intval(date('m', $date->timestamp)));
            $invoice = 'SS' . '/' . $datefull . '/' . $year . '/' . $month . '/' . mt_rand(0000000000, 9999999999);
            return $invoice;
        }
        $cost = RajaOngkir::ongkosKirim([
            'origin' => $request->city_origin,
            'originType' => "city",
            'destination' => $request->city_destination,
            'destinationType' => "city",
            'weight' => array_sum($total_berat) * 1000,
            'courier' => $request->courier,
        ])->get();


        $timestamp = now()->setTimezone('Asia/Jakarta');
        $invoceNumber = generateInvoice($timestamp);
        $alamat = City::join('provinces', 'cities.province_id', '=', 'provinces.province_id')
            ->where('cities.city_id', '=', $request->city_destination)
            ->get(['provinces.title as province', 'cities.title as city',])->first();
        $pesanan_id = PesananModel::insertGetId([
            'user_id' => $user_id = $request->session()->get('data_user')[0]['id'],
            'harga_pengiriman' => $cost[0]['costs'][0]['cost'][0]['value'],
            'detail_alamat' => $_POST['detail_alamat'] . ' ' . $alamat->province . ' ' . $alamat->city,
            'total_harga_barang' => array_sum($harga_pesanan),
            'random' => mt_rand(100, 999),
            'status' => 'Belum Terbayar',
            'img_pembelian' => '',
            'nomor_resi' => '',
            'kurir' => $request->courier . '.png',
            'invoice' => $invoceNumber,
            'timestamp' => $timestamp->toDate()
        ]);

        foreach ($keranjang as $item) {
            DetailPesananModel::create([
                'pesanan_id' => $pesanan_id,
                'barang_id' => $item->id_produk,
                'total_harga' => $item->harga,
                'total_berat' => $item->berat,
                'quantity' => $item->quantity
            ]);
        }

        $belanja = KeranjangModel::where('user_id', '=', $user_id)->delete();

        return redirect('/detail_pembelian/' . $pesanan_id);
    }

    public function keranjang_belanja(Request $request, $id_produk)
    {
        $user_id = $request->session()->get('data_user')[0]['id'];
        $nama_user = $request->session()->get('data_user')[0]['nama'];
        $produk_hose = UserModelProduk::find($id_produk);
        $quantity = $_POST['quantity'];
        $cek_pesanan_detail = KeranjangModel::where('user_id', $user_id)->where('id_produk', $produk_hose->id_produk)->first();

        if (empty($cek_pesanan_detail)) {
            KeranjangModel::create([
                'user_id' => $user_id,
                'id_produk'  => $produk_hose->id_produk,
                'berat' => $produk_hose->berat * $quantity,
                'quantity' => $quantity,
                'harga' => $produk_hose->harga * $quantity,
            ])->get();
        } else {
            $update_pesanan = KeranjangModel::where('id_produk', $produk_hose->id_produk)->get();
            $quantity_sekarang = $update_pesanan[0]->quantity;
            $quantity_total = $quantity + $quantity_sekarang;
            $validateData = ([
                'quantity' => $quantity_total,
                'harga' => $produk_hose->harga * $quantity_total,
            ]);
            $tambah_pesanan = KeranjangModel::where('id_produk', $produk_hose->id_produk);
            $tambah_pesanan->update($validateData);
        }
        // $cek_pesanan_harga = DetailPesananModel::where('user_id', $user_id)->first();
        // if (empty($cek_pesanan_harga)) {
        //     DetailPesananModel::create([
        //         'user_id' => $user_id,
        //         'nama_user' => $nama_user,
        //         'total_harga' => $produk_hose->harga * $quantity,
        //         'berat' => $produk_hose->berat * $quantity,
        //     ])->get();
        // } else {
        //     // Harga Total
        //     $total_harga = DetailPesananModel::where('user_id', $user_id)->get();
        //     $harga_sekarang = $total_harga[0]->total_harga;
        //     $berat_sekarang = $total_harga[0]->berat;
        //     $validateDataDetail = ([
        //         'total_harga' => $produk_hose->harga * $quantity + $harga_sekarang,
        //         'berat' => $produk_hose->berat + $berat_sekarang,
        //     ]);
        //     $tambah_pesanan_detail = DetailPesananModel::where('user_id', $user_id);
        //     $tambah_pesanan_detail->update($validateDataDetail);
        // }
        return redirect('/keranjang');
    }

    public function bukti_pembayaran(Request $request, $pesanan_id)
    {
        $validateData = ([
            'status' => 'Sedang Diproses',
        ]);
        $validateData['img_pembelian'] = $request->file('img_pembelian')->store('gambar-upload-pembelian');
        PesananModel::where('pesanan_id', $pesanan_id)->update($validateData);

        return view('user.terimakasih');
    }
}
