<?php

namespace App\Http\Controllers;

use App\Models\DetailPesananModel;
use App\Models\KeranjangModel;
use App\Models\LoginModel;
use App\Models\ProdukDetailModel;
use App\Models\UserModel;
use App\Models\MitraModel;
use App\Models\UserModelProduk;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Models\Courier;
use App\Models\Province;
use Illuminate\Auth\Events\Login;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->session()->all();
        $data2 = $request->session()->get('data_user');

        if ($data == null) {
            $mitra = MitraModel::all();
            $riwayat = LoginModel::where('nama', '=', $request->session()->get('data_user')[0]['nama'])
                ->get();
            return view('user.tampil_riwayat', ['mitra' => $mitra, 'riwayat' => $riwayat]);
        } else {
            if ($data2 = $data2) {
                $mitra = MitraModel::all();
                $riwayat = LoginModel::where('nama', '=', $request->session()->get('data_user')[0]['nama'])
                    ->get();
                return view('user.tampil_riwayat', ['mitra' => $mitra, 'riwayat' => $riwayat]);
            } else {
                $request->session()->flush();
                $mitra = MitraModel::all();
                return view('user.tampil', ['mitra' => $mitra]);
            }
        }
    }

    public function detail_pembelian(Request $request)
    {
        $belanja = KeranjangModel::join('login_user', 'keranjang_belanja.user_id', '=', 'login_user.id')
            ->join('produk', 'keranjang_belanja.id_produk', '=', 'produk.id_produk')
            ->where('login_user.id', '=', $request->session()->get('data_user')[0]['id'])
            ->get(['login_user.*', 'keranjang_belanja.*', 'produk.*']);
        // $total_harga = DetailPesananModel::join('login_user', 'detail_pembelian.user_id', '=', 'login_user.id')
        //     ->where('login_user.id', '=', $request->session()->get('data_user')[0]['id'])
        //     ->get(['login_user.*', 'detail_pembelian.*']);
        // dd($belanja);
        $total_harga = [];
        foreach ($belanja as $item) {
            array_push($total_harga, intval($item->harga) * intval($item->quantity));
        }
        return view('user.detail_pembelian', ['belanja' => $belanja, 'total_harga' => array_sum($total_harga)]);
    }

    public function riwayat(Request $request)
    {
        $user_id = $request->session()->get('data_user')[0]['id'];
        $pesanan = DetailPesananModel::join('pesanan', 'detail_pesanan.pesanan_id', '=', 'pesanan.pesanan_id')
            ->join('produk', 'detail_pesanan.barang_id', '=', 'produk.id_produk')
            ->join('login_user', 'pesanan.user_id', '=', 'login_user.id')
            ->where('login_user.id', '=', $request->session()->get('data_user')[0]['id'])
            ->get(['pesanan.*', 'detail_pesanan.*', 'login_user.*', 'produk.*']);
        $data = [];
        function toStringDate($timestamp)
        {
            $date = date('d M Y g:i', strtotime($timestamp));
            return $date . ' WIB';
        }
        foreach ($pesanan as $item) {
            if (array_key_exists($item->pesanan_id, $data)) {
                array_push($data[$item->pesanan_id]['data'], $item);
            } else {
                $data[$item->pesanan_id]['data'] = array($item);
                $data[$item->pesanan_id]['total_harga'] = $item->total_harga_barang + $item->random;
                $data[$item->pesanan_id]['invoice'] = $item->invoice;
                $data[$item->pesanan_id]['timestamp'] = toStringDate($item->timestamp);
            }
        }
        return view('user.riwayat', ['pesanan' => $data]);
    }

    public function keranjang(Request $request)
    {
        $couriers = Courier::pluck('title', 'code');
        $provinces = Province::pluck('title', 'province_id');
        $belanja = KeranjangModel::join('login_user', 'keranjang_belanja.user_id', '=', 'login_user.id')
            ->join('produk', 'keranjang_belanja.id_produk', '=', 'produk.id_produk')
            ->where('login_user.id', '=', $request->session()->get('data_user')[0]['id'])
            ->get(['login_user.*', 'keranjang_belanja.*', 'produk.*']);
        // $total_harga = DetailPesananModel::join('login_user', 'detail_pembelian.user_id', '=', 'login_user.id')
        //     ->where('login_user.id', '=', $request->session()->get('data_user')[0]['id'])
        //     ->get(['login_user.*', 'detail_pembelian.*']);
        // dd($belanja);
        $total_harga = [];
        foreach ($belanja as $item) {
            array_push($total_harga, intval($item->harga) * intval($item->quantity));
        }
        if (count($belanja) >= 1) {
            return view('user.keranjang_belanja', ['belanja' => $belanja, 'total_harga' => array_sum($total_harga)], compact('couriers', 'provinces'));
        } else {
            return redirect('/')->with("gagal", "Belum ada riwayat pembelanjaan");
        }
    }

    public function delete_pesanan($id)
    {
        $belanja = KeranjangModel::find($id);
        $belanja->delete($belanja);
        return redirect('/keranjang');
    }

    // Produk User
    public function produk_hose()
    {
        $produk_hose = UserModelProduk::where('kategori', 'LIKE', 'Hydraulic Hose')->get();
        $artikel = ProdukDetailModel::where('kategori_artikel', 'LIKE', 'Hydraulic Hose')->get();
        return view('user.produk.produk_hose', ['produk_hose' => $produk_hose], ['artikel' => $artikel]);
    }

    public function produk_industrial()
    {
        $produk_hose = UserModelProduk::where('kategori', 'LIKE', 'Industrial Hose')->get();
        $artikel = ProdukDetailModel::where('kategori_artikel', 'LIKE', 'Industrial Hose')->get();
        return view('user.produk.produk_industrial', ['produk_hose' => $produk_hose], ['artikel' => $artikel]);
    }

    public function produk_pipa_nozel()
    {
        $produk_hose = UserModelProduk::where('kategori', 'LIKE', 'Pipa Nozel')->get();
        $artikel = ProdukDetailModel::where('kategori_artikel', 'LIKE', 'Pipa Nozel')->get();
        return view('user.produk.produk_pipa_nozel', ['produk_hose' => $produk_hose], ['artikel' => $artikel]);
    }

    public function produk_felxible()
    {
        $produk_hose = UserModelProduk::where('kategori', 'LIKE', 'Flexible Stainless')->get();
        $artikel = ProdukDetailModel::where('kategori_artikel', 'LIKE', 'Flexible Stainless')->get();
        return view('user.produk.produk_industrial', ['produk_hose' => $produk_hose], ['artikel' => $artikel]);
    }

    public function produk_assesoris()
    {
        $produk_hose = UserModelProduk::where('kategori', 'LIKE', 'Assesories')->get();
        $artikel = ProdukDetailModel::where('kategori_artikel', 'LIKE', 'Assesories')->get();
        return view('user.produk.produk_industrial', ['produk_hose' => $produk_hose], ['artikel' => $artikel]);
    }

    // Franchise
    public function franchise()
    {
        $user = UserModel::all();
        $user1 = UserModelProduk::all();
        return view('user.franchise', ['user' => $user], ['user1' => $user1]);
    }

    // Kantor
    public function contact()
    {
        $user = UserModel::all();
        $user1 = UserModelProduk::all();
        return view('user.contact', ['user' => $user], ['user1' => $user1]);
    }

    // Login
    public function login()
    {
        return view('user.login');
    }

    public function login_user(Request $request)
    {
        $data_nama = LoginModel::where([
            'nama' => $request->nama,
        ])->get();
        $data_password = LoginModel::where([
            'password' => $request->password,
        ])->get();

        if (count($data_nama) == 0) {
            return back()->with("gagal", "Nama tidak terdaftar");
        } else if (count($data_password) == 0) {
            return back()->with("gagal", "Password salah");
        } else {
            $request->session()->put('data_user', $data_nama);
            return redirect('/');
        }
    }

    public function register_user(Request $request)
    {
        $data_nama = LoginModel::where([
            'nama' => $request->nama,
        ])->get();
        $data_email = LoginModel::where([
            'email' => $request->email,
        ])->get();

        if (count($data_nama) == 1) {
            return back()->with("gagal_regis", "Nama Sudah Digunakan");
        } else if (count($data_email) == 1) {
            return back()->with("gagal_regis", "Email Sudah Digunakan");
        } else {
            $validateData = $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);

            LoginModel::create($validateData);
            return redirect('/login');
        }
    }

    public function logout_user(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
