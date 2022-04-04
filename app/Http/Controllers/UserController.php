<?php

namespace App\Http\Controllers;

use Illuminate\Support\File;
use App\Models\UserModel;
use App\Models\UserModelProduk;
use App\Models\UserModelProdukCabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\Output;

class UserController extends Controller
{
    public function admin()
    {
        $user = UserModel::all();
        $user1 = UserModelProduk::all();
        return view('admin_website.admin', ['user' => $user], ['user1' => $user1]);
    }

    public function admin_cabang()
    {
        $barang = UserModelProdukCabang::all();
        return view('admin_cabang.admin_cabang', ['barang' => $barang]);
    }

    public function tampil_cabang()
    {
        $barang = UserModelProdukCabang::all();
        return view('admin_cabang.tampil', ['barang' => $barang]);
    }

    public function tampil()
    {
        $user = UserModel::all();
        $user1 = UserModelProduk::all();
        return view('user.tampil', ['user' => $user], ['user1' => $user1]);
    }

    public function franchise()
    {
        $user = UserModel::all();
        $user1 = UserModelProduk::all();
        return view('user.franchise', ['user' => $user], ['user1' => $user1]);
    }

    public function contact()
    {
        $user = UserModel::all();
        $user1 = UserModelProduk::all();
        return view('user.contact', ['user' => $user], ['user1' => $user1]);
    }

    public function tambah()
    {
        return view('admin_website.tambah');
    }
    public function add(Request $request)
    {
        $validateData = $request->validate([
            'kota' => 'required',
            'alamat' => 'required'
        ]);

        $validateData['img'] = $request->file('img')->store('gambar-upload');
        UserModel::create($validateData);
        return redirect('/admin');
    }
    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('admin_website.ubah', ['user' => $user]);
    }

    public function edit(Request $request, $id)
    {
        $validateData = $request->validate([
            'kota' => 'required',
            'alamat' => 'required'
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
    public function tambah_produk()
    {
        return view('admin_website.tambah_produk');
    }

    public function add_produk(Request $request)
    {
        $validateData = $request->validate([
            'nama_produk' => 'required'
        ]);

        $validateData['img_produk'] = $request->file('img_produk')->store('gambar-upload-produk');
        UserModelProduk::create($validateData);
        return redirect('/admin');
    }
}
