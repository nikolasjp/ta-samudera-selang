<?php

namespace App\Http\Controllers;

use App\Models\CheckoutModel;
use Illuminate\Http\Request;
use App\Models\Courier;
use App\Models\Province;
use App\Models\City;
use App\Models\DetailPembelianModel;
use App\Models\UserModelProduk;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CekOngkirController extends Controller
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
        $produk_hose = UserModelProduk::find($id_produk);
        $cost = RajaOngkir::ongkosKirim([
            'origin' => $request->city_origin,
            'destination' => $request->city_destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ])->get();

        DetailPembelianModel::create([
            'nama_barang'  => $produk_hose->nama_produk,
            'harga' => $produk_hose->harga,
            'quantity' => $_POST['quantity'],
            'harga_pengiriman' => $cost[0]['costs'][0]['cost'][0]['value'],
            'detail_alamat' => 'TESTING',
            'total_harga' => $_POST['quantity']  * $produk_hose->harga + $cost[0]['costs'][0]['cost'][0]['value'],
            'status' => 'BELUM TERBAYAR'
        ]);
        // dd($cost);
        if (count($cost[0]["costs"]) == 0) {
            return ('Destinasi pengiriman paket tidak tersedia');
        } else {
            return view('user.beli_produk.checkout', ['produk_hose' => $produk_hose])->with('cost', $cost);
        }
    }
}
