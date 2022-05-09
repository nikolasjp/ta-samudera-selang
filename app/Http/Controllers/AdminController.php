<?php

namespace App\Http\Controllers;

use Illuminate\Support\File;
use App\Models\AdminModelProdukCabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\Output;

class AdminController extends Controller
{
    public function dashboard_admin()
    {
        $barang = AdminModelProdukCabang::all();
        $sumBarangMasuk = AdminModelProdukCabang::all()->sum('barang_masuk');
        $sumBarangKeluar = AdminModelProdukCabang::all()->sum('barang_keluar');
        $sumStokBarang = AdminModelProdukCabang::all()->sum('stok');
        return view('admin_cabang.dashboard_admin', ['barang' => $barang, 'sumBarangMasuk' => $sumBarangMasuk, 'sumBarangKeluar' => $sumBarangKeluar, 'sumStokBarang' => $sumStokBarang]);
    }

    public function tambah_barang()
    {
        $barang = AdminModelProdukCabang::all();
        $filterData = AdminModelProdukCabang::where('nama_barang', 'LIKE', '%' . $barang . '%')->get();
        return view('admin_cabang.tambah_barang', ['barang' => $barang, 'filterData' => $filterData]);
    }

    public function delete_barang($id)
    {
        $barang = AdminModelProdukCabang::find($id);
        $barang->delete($barang);
        return redirect('/dashboard_admin');
    }

    public function edit_barang(Request $request, $id)
    {
        $validateData = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'barang_masuk' => 'required',
            'barang_keluar' => 'nullable'
        ]);
        $barang = AdminModelProdukCabang::find($id);
        $barang->update($validateData);
        return redirect('/dashboard_admin');
    }

    public function add_barang(Request $request)
    {
        $validateData = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'barang_masuk' => 'required',
            'barang_keluar' => 'nullable'
        ]);
        AdminModelProdukCabang::create($validateData);
        return redirect('/dashboard_admin');
    }
}
