<?php

namespace App\Http\Controllers;

use App\Models\ProdukDetailModel;
use Illuminate\Support\File;
use App\Models\UserModel;
use App\Models\MitraModel;
use App\Models\UserModelProduk;
use App\Models\UserModelProdukCabang;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\Output;

class UserController extends Controller
{
    public function admin()
    {
        $user = UserModel::all();
        $user1 = UserModelProduk::all();
        $produk_detail = ProdukDetailModel::all();
        $mitra = MitraModel::all();
        return view('admin_website.admin', ['user' => $user, 'mitra' => $mitra, 'produk_detail' => $produk_detail], ['user1' => $user1]);
    }

    public function tampil()
    {
        $mitra = MitraModel::all();
        return view('user.tampil', ['mitra' => $mitra]);
    }

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

    public function tambah_kantor()
    {
        return view('admin_website.tambah_kantor');
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
    // Kantor
    public function ubah_kantor($id)
    {
        $user = UserModel::find($id);
        return view('admin_website.ubah_kantor', ['user' => $user]);
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

    // Mitra
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

    // Produk
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

    // Artikel
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

    public function delete($id)
    {
        $user = UserModel::find($id);
        $user->delete($user);
        return redirect('/admin');
    }

    public function delete_produk($id)
    {
        $user1 = UserModelProduk::find($id);
        $user1->delete($user1);
        return redirect('/admin');
    }

    public function delete_mitra($id)
    {
        $mitra = MitraModel::find($id);
        $mitra->delete($mitra);
        return redirect('/admin');
    }

    public function delete_artikel($id)
    {
        $artikel = ProdukDetailModel::find($id);
        $artikel->delete($artikel);
        return redirect('/admin');
    }

    public function tambah_produk()
    {
        return view('admin_website.tambah_produk');
    }

    public function add_produk(Request $request)
    {
        $validateData = $request->validate([
            'kategori' => 'required',
            'nama_produk' => 'required',
            'detail_produk' => 'required',
            'status_stok' => 'required'
        ]);

        $validateData['img_produk'] = $request->file('img_produk')->store('gambar-upload-produk');
        UserModelProduk::create($validateData);
        return redirect('/admin');
    }

    public function tambah_mitra()
    {
        return view('admin_website.tambah_mitra');
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

    public function tambah_artikel()
    {
        return view('admin_website.tambah_artikel');
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
}
