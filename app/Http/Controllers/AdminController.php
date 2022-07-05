<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginAdminModel;
use App\Models\UserModelProduk;
use App\Models\UserModel;
use App\Models\MitraModel;
use App\Models\ProdukDetailModel;
use App\Models\DetailPesananModel;
use App\Models\Pengiriman;
use DateTime;
use App\Models\PesananModel;

class AdminController extends Controller
{
    // Login Admin
    public function login_admin(Request $request)
    {
        $data = LoginAdminModel::where([
            'nama' => $request->nama,
            'password' => $request->password,
        ])->get();
        if (count($data) == 1) {
            $allData = AdminController::get_all_data($data);
            $request->session()->put('nama', $request->nama);
            $request->session()->put('password', $request->password);
            return redirect('/admin');
        } else {
            return redirect('/admin');
        }
    }

    private function toStringDate($timestamp)
    {
        $date = $timestamp;
        return $date . ' WIB';
    }

    public function get_all_data($data)
    {
        $user = UserModel::all();
        $user1 = UserModelProduk::all();
        $produk_detail = ProdukDetailModel::all();
        $mitra = MitraModel::all();
        $pesanan = DetailPesananModel::join('pesanan', 'detail_pesanan.pesanan_id', '=', 'pesanan.pesanan_id')
            ->join('produk', 'detail_pesanan.barang_id', '=', 'produk.id_produk')
            ->join('login_user', 'pesanan.user_id', '=', 'login_user.id')
            ->get(['pesanan.*', 'detail_pesanan.*', 'produk.*', 'login_user.*']);
        $data = [];
        foreach ($pesanan as $item) {
            if (array_key_exists($item->pesanan_id, $data)) {
                array_push($data[$item->pesanan_id]['data'], $item);
            } else {
                $data[$item->pesanan_id]['data'] = array($item);
                $data[$item->pesanan_id]['total_harga'] = $item->total_harga_barang + $item->random;
                $data[$item->pesanan_id]['invoice'] = $item->invoice;
                $data[$item->pesanan_id]['status'] = $item->status;
                $data[$item->pesanan_id]['pesanan_id'] = $item->pesanan_id;
                $data[$item->pesanan_id]['nama'] = $item->nama;
                $data[$item->pesanan_id]['img_pembelian'] = $item->img_pembelian;
                $data[$item->pesanan_id]['timestamp'] = $this->toStringDate($item->timestamp);
            }
            // dd($data);
        }
        // dd($data);
        return  ['data' => $data, 'user' => $user, 'mitra' => $mitra, 'produk_detail' => $produk_detail, 'pesanan' => $data, 'user1' => $user1];
    }

    public function admin(Request $request)
    {
        $nama = ($request->session()->get('nama'));
        $password = ($request->session()->get('password'));
        $data = LoginAdminModel::where([
            'nama' => $nama,
            'password' => $password,
        ])->get();
        if (count($data) == 1) {
            $allData = AdminController::get_all_data($data);
            return view('admin_website.admin', $allData);
        } else {
            return view('admin_website.login_admin');
        }
    }

    // Logout Admin
    public function logout_admin(Request $request)
    {
        $request->session()->forget('nama');
        return redirect('/login_admin');
    }

    // Kantor
    public function tambah_kantor(Request $request)
    {
        $nama = ($request->session()->get('nama'));
        $password = ($request->session()->get('password'));
        $data = LoginAdminModel::where([
            'nama' => $nama,
            'password' => $password,
        ])->get();
        if (count($data) == 1) {
            return view('admin_website.tambah_kantor');
        } else {
            return view('admin_website.login_admin');
        }
    }
    public function add(Request $request)
    {
        $validateData = $request->validate([
            'kota' => 'required',
            'alamat' => 'required',
            'link' => 'required'
        ]);

        $validateData['img'] = $request->file('img')->store('gambar-upload');
        UserModel::create($validateData);
        return redirect('/admin');
    }

    public function ubah_kantor($id)
    {
        $user = UserModel::find($id);
        return view('admin_website.ubah_kantor', ['user' => $user]);
    }

    public function edit(Request $request, $id)
    {
        $validateData = $request->validate([
            'kota' => 'required',
            'alamat' => 'required',
            'link' => 'required'
        ]);
        $user = UserModel::find($id);
        $validateData['img'] = $request->file('img')->store('gambar-upload');
        $user->update($validateData);
        return redirect('/admin');
    }

    public function delete($id)
    {
        $user = UserModel::find($id);
        $user->delete($user);
        return redirect('/admin');
    }

    // Produk
    public function tambah_produk(Request $request)
    {
        $nama = ($request->session()->get('nama'));
        $password = ($request->session()->get('password'));
        $data = LoginAdminModel::where([
            'nama' => $nama,
            'password' => $password,
        ])->get();
        if (count($data) == 1) {
            return view('admin_website.tambah_produk');
        } else {
            return view('admin_website.login_admin');
        }
    }

    public function add_produk(Request $request)
    {
        $validateData = $request->validate([
            'kategori' => 'required',
            'nama_produk' => 'required',
            'detail_produk' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'status_stok' => 'required'
        ]);

        $validateData['img_produk'] = $request->file('img_produk')->store('gambar-upload-produk');
        UserModelProduk::create($validateData);
        return redirect('/admin');
    }

    public function ubah_produk($id)
    {
        $user1 = UserModelProduk::find($id);
        return view('admin_website.ubah_produk', ['user1' => $user1]);
    }

    public function edit_produk(Request $request, $id)
    {
        $validateData = $request->validate([
            'kategori' => 'required',
            'nama_produk' => 'required',
            'detail_produk' => 'required',
            'status_stok' => 'required'
        ]);
        $user1 = UserModelProduk::find($id);
        $validateData['img_produk'] = $request->file('img_produk')->store('gambar-upload-produk');
        $user1->update($validateData);
        return redirect('/admin');
    }

    public function delete_produk($id)
    {
        $user1 = UserModelProduk::find($id);
        $user1->delete($user1);
        return redirect('/admin');
    }

    // Mitra
    public function tambah_mitra(Request $request)
    {
        $nama = ($request->session()->get('nama'));
        $password = ($request->session()->get('password'));
        $data = LoginAdminModel::where([
            'nama' => $nama,
            'password' => $password,
        ])->get();
        if (count($data) == 1) {
            return view('admin_website.tambah_mitra');
        } else {
            return view('admin_website.login_admin');
        }
    }

    public function add_mitra(Request $request)
    {
        $validateData = $request->validate([
            'nama_mitra' => 'required'
        ]);

        $validateData['img_mitra'] = $request->file('img_mitra')->store('gambar-upload-mitra');
        MitraModel::create($validateData);
        return redirect('/admin');
    }

    public function ubah_mitra($id)
    {
        $mitra = MitraModel::find($id);
        return view('admin_website.ubah_mitra', ['mitra' => $mitra]);
    }

    public function edit_mitra(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_mitra' => 'required'
        ]);
        $mitra = MitraModel::find($id);
        $validateData['img_mitra'] = $request->file('img_mitra')->store('gambar-upload-mitra');
        $mitra->update($validateData);
        return redirect('/admin');
    }

    public function delete_mitra($id)
    {
        $mitra = MitraModel::find($id);
        $mitra->delete($mitra);
        return redirect('/admin');
    }

    // Artikel
    public function tambah_artikel(Request $request)
    {
        $nama = ($request->session()->get('nama'));
        $password = ($request->session()->get('password'));
        $data = LoginAdminModel::where([
            'nama' => $nama,
            'password' => $password,
        ])->get();
        if (count($data) == 1) {
            return view('admin_website.tambah_artikel');
        } else {
            return view('admin_website.login_admin');
        }
    }

    public function add_artikel(Request $request)
    {
        $validateData = $request->validate([
            'kategori_artikel' => 'required',
            'header_produk' => 'required',
            'content_produk' => 'required',
            'content_produk_2' => 'required'
        ]);

        ProdukDetailModel::create($validateData);
        return redirect('/admin');
    }

    public function ubah_artikel($id)
    {
        $produk_detail = ProdukDetailModel::find($id);
        return view('admin_website.ubah_artikel', ['produk_detail' => $produk_detail]);
    }

    public function edit_artikel(Request $request, $id)
    {
        $validateData = $request->validate([
            'kategori_artikel' => 'required',
            'header_produk' => 'required',
            'content_produk' => 'required',
            'content_produk_2' => 'required'
        ]);
        ProdukDetailModel::find($id)->update($validateData);
        return redirect('admin');
    }

    public function delete_artikel($id)
    {
        $artikel = ProdukDetailModel::find($id);
        $artikel->delete($artikel);
        return redirect('/admin');
    }

    public function add_pengiriman(Request $request, $pesanan_id)
    {
        $timestamp = now()->setTimezone('Asia/Jakarta');
        $validateData = ([
            'timestamp' => $timestamp->toDate(),
            'nomor_resi' => $request->nomor_resi,
            'status' => 'Dikirim',
        ]);
        PesananModel::where('pesanan_id', $pesanan_id)->update($validateData);
        return redirect('/admin');
    }

    //Checkout
    public function verifikasi($pesanan_id)
    {
        $timestamp = now()->setTimezone('Asia/Jakarta');
        $validateData = ([
            'status' => 'Terbayar',
            'timestamp' => $timestamp->toDate(),
        ]);
        PesananModel::where('pesanan_id', $pesanan_id)->update($validateData);
        return redirect('/admin');
    }

    public function ubah_pesanan($id)
    {
        $checkout = DetailPesananModel::find($id);
        return view('admin_website.ubah_pembelian', ['checkout' => $checkout]);
    }

    public function delete_pesanan($id)
    {
        $checkout = DetailPesananModel::find($id);
        $checkout->delete($checkout);
        return redirect('/admin');
    }
}
