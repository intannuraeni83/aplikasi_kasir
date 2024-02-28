<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProdukExport;
use Dompdf\Dompdf;
use Dompdf\Options;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all(); // Mendapatkan semua data produk dari database
        return view('data_produk.index', compact('produk'));
    }

    public function create()
    {
        return view('data_produk.form_create');
    }

    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        
        ],[
            'nama_produk.required'=> 'Nama Wajib di isi',
            'harga.required'=> 'Harga wajib di isi',
            'stok.required'=> 'Stok wajib di isi',
        
        ]);
    
        
        // Simpan produk baru ke database
        produk::create($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    public function export_excel()
    {
        return Excel::download(new ProdukExport, 'produk.xlsx');
    }
    public function export_Pdf()
    {
        $produk = Produk::all();

        // Inisialisasi objek Dompdf
        $pdf = new Dompdf();

        // Membuat opsi Dompdf (Opsional)
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);

        // Memuat tampilan Blade dan merender HTML
        $html = view('data_produk.export_Pdf', compact('produks'))->render();

        // Memuat HTML ke dalam objek PDF
        $pdf->loadHtml($html);

        // Render PDF
        $pdf->render();

        // Mengirimkan PDF sebagai respons
        return $pdf->stream('produk.pdf');
    }

    public function edit(produk $produk)
    {
        return view('data_produk.form_edit', compact('produk'));
    }

    public function update(Request $request, produk $produk)
    {
        // Validasi data dari form
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        // Update produk ke database
        $produk->update($request->all());

        return back()->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(produk $produk)
    {
        // Hapus produk dari database
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
