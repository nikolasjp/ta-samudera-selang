<?php

namespace App\Http\Controllers;

use App\Models\DetailPembelianModel;
use App\Models\LoginModel;
use App\Models\ProdukDetailModel;
use App\Models\UserModel;
use App\Models\MitraModel;
use App\Models\UserModelProduk;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function tampil(Request $request)
    {
        $cek_data = $request->session()->all();
        if (count($cek_data) >= 1) {
            $mitra = MitraModel::all();
            $riwayat = LoginModel::where('nama', '=', $request->session()->get('data_user')[0]['nama'])
                ->get();
            return view('user.tampil_riwayat', ['mitra' => $mitra, 'riwayat' => $riwayat], $request->session()->all());
        } else {
            $request->session()->flush();
            $mitra = MitraModel::all();
            return view('user.tampil', ['mitra' => $mitra]);
        }
    }

    public function index(Request $request)
    {
        $data = $request->session()->all();
        $data2 = $request->session()->get('data_user');

        if (count($data) == 1) {
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

    public function riwayat(Request $request)
    {
        $riwayat = DetailPembelianModel::join('login_user', 'detail_pembelian.user_id', '=', 'login_user.id')
            ->where('login_user.id', '=', $request->session()->get('data_user')[0]['id'])
            ->get(['login_user.*', 'detail_pembelian.*']);
        if (count($riwayat) >= 1) {
            return view('user.riwayat', ['riwayat' => $riwayat]);
        } else {
            return redirect('/tampil')->with("gagal", "Belum ada riwayat transaksi");
        }
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
            return redirect('/tampil');
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
