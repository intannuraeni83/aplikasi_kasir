<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Produk;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('data_penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('penjualan.create', compact('produks'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah_produk' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        // Simpan data penjualan baru
        $penjualan = new Penjualan();
        $penjualan->produk_id = $request->produk_id;
        $penjualan->jumlah_produk = $request->jumlah_produk;
        $penjualan->subtotal = $request->subtotal;
        $penjualan->save();

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan.');
    }

    // Tambahkan metode lain seperti edit, update, delete sesuai kebutuhan
}
