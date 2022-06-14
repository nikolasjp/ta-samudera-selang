<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courier;
use App\Models\Province;
use App\Models\City;
use App\Models\DetailPembelianModel;
use App\Models\UserModelProduk;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutController extends Controller
{
    public function index($id_produk)
    {
        $produk_hose = UserModelProduk::find($id_produk);
        $couriers = Courier::pluck('title', 'code');
        $provinces = Province::pluck('title', 'province_id');
        return view('user.beli_produk.beli_hose', ['produk_hose' => $produk_hose], compact('couriers', 'provinces'));
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('title', 'city_id');
        return json_encode($city);
    }

    public function submit(Request $request, $id_produk)
    {
        $data = $request->session()->all();
        if (count($data) >= 1) {
            $produk_hose = UserModelProduk::find($id_produk);

            $cost = RajaOngkir::ongkosKirim([
                'origin' => $request->city_origin,
                'destination' => $request->city_destination,
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
                return ('Destinasi pengiriman paket tidak tersedia');
            } else {
                return view('user.beli_produk.checkout', ['produk_hose' => $produk_hose])->with('cost', $cost);
            }
        } else {
            return redirect('/login');
        }
    }

    public function confirm(Request $request)
    {
        $user_id = $request->session()->get('data_user')[0]['id'];
        $produk_hose = $request->session()->get('confirm-user-' . $user_id)['produk_hose'];
        $cost = $request->session()->get('confirm-user-' . $user_id)['cost'];
        $data_query = $request->session()->get('confirm-user-' . $user_id)['data_query'];
        DetailPembelianModel::create([
            'user_id' => $user_id,
            'nama_barang'  => $produk_hose->nama_produk,
            'harga' => $produk_hose->harga,
            'quantity' => $data_query['quantity'],
            'harga_pengiriman' => $cost[0]['costs'][0]['cost'][0]['value'],
            'detail_alamat' => $data_query['detail_alamat'],
            'total_harga' => $data_query['total_harga'],
            'status' => 'BELUM TERBAYAR'
        ])->get();

        return redirect('/riwayat');
    }
}
