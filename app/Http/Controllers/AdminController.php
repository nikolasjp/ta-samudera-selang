<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginAdminModel;
use App\Models\UserModelProduk;
use App\Models\UserModel;
use App\Models\MitraModel;
use App\Models\ProdukDetailModel;
use App\Models\DetailPembelianModel;

class AdminController extends Controller
{
    // Login Admin
    public function login_admin(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = LoginAdminModel::where([
                'nama' => $request->nama,
                'password' => $request->password,
            ])->get();
            if (count($data) == 1) {
                $allData = AdminController::get_all_data($data);
                $request->session()->put('nama', $request->nama);
                $request->session()->put('password', $request->password);
                return view('admin_website.admin', $allData);
            } else {
                return redirect('/admin');
            }
        } else {
            $nama = ($request->session()->get('nama'));
            $password = ($request->session()->get('password'));
            $data = LoginAdminModel::where([
                'nama' => $nama,
                'password' => $password,
            ])->get();
            if (count($data) == 1) {
                $user = UserModel::all();
                $user1 = UserModelProduk::all();
                $produk_detail = ProdukDetailModel::all();
                $mitra = MitraModel::all();
                $checkout = DetailPembelianModel::all();
                return view('admin_website.admin', ['data' => $data, 'user' => $user, 'mitra' => $mitra, 'produk_detail' => $produk_detail, 'checkout' => $checkout], ['user1' => $user1]);
            } else {
                return redirect('/admin');
            }
        }
    }

    public function get_all_data($data)
    {
        $user = UserModel::all();
        $user1 = UserModelProduk::all();
        $produk_detail = ProdukDetailModel::all();
        $mitra = MitraModel::all();
        $checkout = DetailPembelianModel::all();

        return  ['data' => $data, 'user' => $user, 'mitra' => $mitra, 'produk_detail' => $produk_detail, 'checkout' => $checkout, 'user1' => $user1];
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
    public function logout(Request $request)
    {
        $request->session()->flush();
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

    //Checkout
    public function verifikasi($id)
    {
        $checkout = DetailPembelianModel::find($id);
        $checkout->update([
            'status' => 'TERBAYAR'
        ]);
        return redirect('/admin');
    }

    public function ubah_pesanan($id)
    {
        $checkout = DetailPembelianModel::find($id);
        return view('admin_website.ubah_pembelian', ['checkout' => $checkout]);
    }

    public function edit_pembelian(Request $request, $id)
    {
        $validateData = $request->validate([
            'quantity' => 'required',
            'detail_alamat' => 'required'
        ]);
        $checkout = DetailPembelianModel::find($id);
        $checkout->update($validateData);
        return redirect('/admin');
    }

    public function delete_pesanan($id)
    {
        $checkout = DetailPembelianModel::find($id);
        $checkout->delete($checkout);
        return redirect('/admin');
    }
}
