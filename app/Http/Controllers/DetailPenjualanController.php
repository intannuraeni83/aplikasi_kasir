<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenjualan;


class DetailPenjualanController extends Controller
{
    public function index()
    {
        $detail_penjualan = DetailPenjualan::all();
        return view('detail_penjualan.index', compact('detail_penjualan'));
    }

    public function create()
{
    // Mendapatkan daftar penjualan dan produk yang tersedia
    $penjualan = Penjualan::all();
    $produk = Produk::all();

    // Mengembalikan view formulir penambahan detail penjualan bersama dengan data penjualan dan produk
    return view('detail_penjualan.form_create', compact('penjualan', 'produk'));
}


    public function store(Request $request)
    {
        // Validasi inputan dari form
        $validatedData = $request->validate([
            'penjualan_id' => 'required',
            'produk_id' => 'required',
            'jumlah_produk' => 'required',
            'subtotal' => 'required',
        ]);

        // Simpan detail penjualan baru ke dalam database
        DetailPenjualan::create($validatedData);

        return redirect()->route('detail_penjualan.index')
            ->with('success', 'Detail penjualan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $detail_penjualan = DetailPenjualan::findOrFail($id);
        return view('detail_penjualan.show', compact('detail_penjualan'));
    }

    public function edit($id)
    {
        // Implementasi form untuk mengedit detail penjualan
    }

    public function update(Request $request, $id)
    {
        // Validasi inputan dari form
        $validatedData = $request->validate([
            'penjualan_id' => 'required',
            'produk_id' => 'required',
            'jumlah_produk' => 'required',
            'subtotal' => 'required',
        ]);

        // Update detail penjualan yang sudah ada
        DetailPenjualan::whereId($id)->update($validatedData);

        return redirect()->route('detail_penjualan.index')
            ->with('success', 'Detail penjualan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus detail penjualan
        DetailPenjualan::findOrFail($id)->delete();
        return redirect()->route('detail_penjualan.index')
            ->with('success', 'Detail penjualan berhasil dihapus.');
    }
}
