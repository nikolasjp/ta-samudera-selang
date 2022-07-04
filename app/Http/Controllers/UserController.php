<?php

namespace App\Http\Controllers;

use App\Models\DetailPesananModel;
use App\Models\KeranjangModel;
use App\Models\LoginModel;
use App\Models\ProdukDetailModel;
use App\Models\UserModel;
use App\Models\MitraModel;
use App\Models\PesananModel;
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
        $user = $request->session()->get('data_user');
        if ($user != null) {
            $mitra = MitraModel::all();
            $riwayat = LoginModel::where('nama', '=', $request->session()->get('data_user')[0]['nama'])
                ->get();
            $belanja = KeranjangModel::join('login_user', 'keranjang_belanja.user_id', '=', 'login_user.id')
                ->join('produk', 'keranjang_belanja.id_produk', '=', 'produk.id_produk')
                ->where('login_user.id', '=', $request->session()->get('data_user')[0]['id'])
                ->get(['login_user.*', 'keranjang_belanja.*', 'produk.*']);
            $produk = UserModelProduk::all();
            $kantor = UserModel::all();
            $produk_hydraulic = UserModelProduk::where('kategori', 'LIKE', 'Hydraulic Hose')->get();
            $produk_industrial = UserModelProduk::where('kategori', 'LIKE', 'Industrial Hose')->get();
            $produk_pipa = UserModelProduk::where('kategori', 'LIKE', 'Pipa Nozel')->get();
            $produk_felxible = UserModelProduk::where('kategori', 'LIKE', 'Flexible Stainless')->get();
            $produk_assesoris = UserModelProduk::where('kategori', 'LIKE', 'Assesories')->get();
            return view('user.tampil_riwayat', ['mitra' => $mitra, 'riwayat' => $riwayat, 'kantor' => $kantor, 'produk' => $produk, 'produk_hydraulic' => $produk_hydraulic, 'produk_industrial' => $produk_industrial, 'produk_pipa' => $produk_pipa, 'produk_felxible' => $produk_felxible, 'produk_assesoris' => $produk_assesoris, 'belanja' => $belanja]);
        } else {
            $mitra = MitraModel::all();
            $produk = UserModelProduk::all();
            $kantor = UserModel::all();
            $produk_hydraulic = UserModelProduk::where('kategori', 'LIKE', 'Hydraulic Hose')->get();
            $produk_industrial = UserModelProduk::where('kategori', 'LIKE', 'Industrial Hose')->get();
            $produk_pipa = UserModelProduk::where('kategori', 'LIKE', 'Pipa Nozel')->get();
            $produk_felxible = UserModelProduk::where('kategori', 'LIKE', 'Flexible Stainless')->get();
            $produk_assesoris = UserModelProduk::where('kategori', 'LIKE', 'Assesories')->get();
            return view('user.tampil', ['mitra' => $mitra, 'kantor' => $kantor, 'produk' => $produk, 'produk_hydraulic' => $produk_hydraulic, 'produk_industrial' => $produk_industrial, 'produk_pipa' => $produk_pipa, 'produk_felxible' => $produk_felxible, 'produk_assesoris' => $produk_assesoris]);
        }
    }

    private function toStringDate($timestamp)
    {
        $date = date('d M Y g:i', strtotime($timestamp));
        return $date . ' WIB';
    }

    public function detail_pembelian(Request $request, $pesanan_id)
    {
        $pesanan = DetailPesananModel::join('pesanan', 'detail_pesanan.pesanan_id', '=', 'pesanan.pesanan_id')
            ->join('produk', 'detail_pesanan.barang_id', '=', 'produk.id_produk')
            ->join('login_user', 'pesanan.user_id', '=', 'login_user.id')
            ->where([['login_user.id', '=', $request->session()->get('data_user')[0]['id']], ['pesanan.pesanan_id', '=', $pesanan_id]])
            ->get(['pesanan.*', 'detail_pesanan.*', 'login_user.*', 'produk.*']);
        $data = ["data" => []];
        foreach ($pesanan as $item) {
            array_push($data['data'], $item);
            $data['total_harga'] = $item->total_harga_barang + $item->random;
            $data['invoice'] = $item->invoice;
            $data['nama'] = $item->nama;
            $data['timestamp'] = $this->toStringDate($item->timestamp);
            $data['status_bayar'] = $item->status;
        }
        $user = $request->session()->get('data_user');

        // dd($data);
        return view('user.detail_pembelian', ['pesanan' => $data, 'user' => $user]);
    }

    public function riwayat(Request $request)
    {
        $pesanan = DetailPesananModel::join('pesanan', 'detail_pesanan.pesanan_id', '=', 'pesanan.pesanan_id')
            ->join('produk', 'detail_pesanan.barang_id', '=', 'produk.id_produk')
            ->join('login_user', 'pesanan.user_id', '=', 'login_user.id')
            ->where('login_user.id', '=', $request->session()->get('data_user')[0]['id'])
            ->get(['pesanan.*', 'detail_pesanan.*', 'login_user.*', 'produk.*']);
        $data = [];
        if (count($pesanan) == 0) {
            $user = $request->session()->get('data_user');
            return view('user.riwayat_empty', ['user' => $user]);
        } else {
            foreach ($pesanan as $item) {
                if (array_key_exists($item->pesanan_id, $data)) {
                    array_push($data[$item->pesanan_id]['data'], $item);
                } else {
                    $data[$item->pesanan_id]['data'] = array($item);
                    $data[$item->pesanan_id]['total_harga'] = $item->total_harga_barang + $item->random;
                    $data[$item->pesanan_id]['invoice'] = $item->invoice;
                    $data[$item->pesanan_id]['status'] = $item->status;
                    $data[$item->pesanan_id]['nama'] = $item->nama;
                    $data[$item->pesanan_id]['pesanan_id'] = $item->pesanan_id;
                    $data[$item->pesanan_id]['kurir'] = $item->kurir;
                    $data[$item->pesanan_id]['nomor_resi'] = $item->nomor_resi;
                    $data[$item->pesanan_id]['timestamp'] = $this->toStringDate($item->timestamp);
                }
            }
            $user = $request->session()->get('data_user');
            return view('user.riwayat', ['pesanan' => $data, 'user' => $user]);
        }
    }

    public function selesai($pesanan_id)
    {
        $checkout = PesananModel::find($pesanan_id);
        $checkout->update([
            'status' => 'Selesai'
        ]);
        return redirect('/riwayat');
    }

    public function keranjang(Request $request)
    {
        $couriers = Courier::pluck('title', 'code');
        $provinces = Province::pluck('title', 'province_id');
        $belanja = KeranjangModel::join('login_user', 'keranjang_belanja.user_id', '=', 'login_user.id')
            ->join('produk', 'keranjang_belanja.id_produk', '=', 'produk.id_produk')
            ->where('login_user.id', '=', $request->session()->get('data_user')[0]['id'])
            ->get(['login_user.*', 'keranjang_belanja.*', 'produk.*']);

        // dd($belanja);
        $total_harga = [];
        foreach ($belanja as $item) {
            array_push($total_harga, intval($item->harga) * intval($item->quantity));
        }
        $user = $request->session()->get('data_user');
        if ($user != null) {
            if (count($belanja) >= 1) {
                return view('user.keranjang_belanja', ['belanja' => $belanja, 'user' => $user, 'total_harga' => array_sum($total_harga)], compact('couriers', 'provinces'));
            } else {
                return view('user.keranjang_empty', ['belanja' => $belanja, 'user' => $user]);
            }
        } else {
            if (count($belanja) >= 1) {
                return view('user.keranjang_belanja', ['belanja' => $belanja, 'total_harga' => array_sum($total_harga)], compact('couriers', 'provinces'));
            } else {
                return redirect('/login')->with("gagal", "Anda harus login terlebih dahulu untuk melihat keranjang belanja");
            }
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
        return view('user.produk.produk_felxible', ['produk_hose' => $produk_hose], ['artikel' => $artikel]);
    }

    public function produk_assesoris()
    {
        $produk_hose = UserModelProduk::where('kategori', 'LIKE', 'Assesories')->get();
        $artikel = ProdukDetailModel::where('kategori_artikel', 'LIKE', 'Assesories')->get();
        return view('user.produk.produk_assesoris', ['produk_hose' => $produk_hose], ['artikel' => $artikel]);
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
    public function login(Request $request)
    {
        $user = $request->session()->get('data_user');
        if ($user != null) {
            return redirect('/keranjang');
        } else {
            return view('user.login');
        }
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
        $request->session()->forget('data_user');
        return redirect('/login');
    }
}
