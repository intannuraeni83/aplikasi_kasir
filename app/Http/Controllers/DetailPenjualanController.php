<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\DetailPenjualanExportView;
use Maatwebsite\Excel\Facades\Excel;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $produk = Produk::all();
        $detpenjualan = DetailPenjualan::with('penjualan', 'produk')->get();
        return view('detail_penjualan.index', compact('detpenjualan', 'pelanggan', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // VALIDASI UNTUK INPUT DATA DETAIL PRODUK
        $request->validate([
            'produk_id' => 'required',
            'jumlah_produk' => 'required'
        ]);

        // MENGAMBIL NILAI DARI SUBTOTAL
        $totalharga = $request->input('subtotal');

        $datapenjualan = [
            'tanggal_penjualan' => now(),
            'total_harga' => $totalharga,
            'pelanggan_id' => $request->pelanggan_id
        ];

        $simpanPenjualan = Penjualan::create($datapenjualan);

        // MENGAMBIL ID DARI DATA PENJUALAN
        $penjualan_id = $simpanPenjualan->id;
        
        $dataDetailPenjualan = [
            'penjualan_id' => $penjualan_id,
            'produk_id' => $request->produk_id,
            'jumlah_produk' => $request->jumlah_produk,
            'subtotal' => $request->subtotal
        ];

        DetailPenjualan::create($dataDetailPenjualan);
        return redirect()->route('detail_penjualan.index')->with('success', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pelanggan = Pelanggan::all();
        // $penjualan = Penjualan::all();
        // $detpenjualan = DetailPenjualan::find($id); // Menggunakan find untuk menangani jika data tidak ditemukan
        // return view('detail_penjualan.show', compact('detpenjualan', 'pelanggan', 'penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'produk_id' => 'required',
            'jumlah_produk' => 'required'
        ]);

        // membambil nilai dari subtotal
        $totalharga = $request->input('subtotal');

        $datapenjualan = [
            'tanggal_penjualan' => now(),
            'total_harga' => $totalharga,
            'pelanggan_id' => $request->pelanggan_id
        ];

        $simpanPenjualan = Penjualan::create($datapenjualan);
        // mengambil id dari tabel penjualan
        $penjualan_id = $simpanPenjualan->id;
        
        $dataDetailPenjualan = [
            'penjualan_id' => $penjualan_id,
            'produk_id' => $request->produk_id,
            'jumlah_produk' => $request->jumlah_produk,
            'subtotal' => $request->subtotal
        ];

        DetailPenjualan::where('id', $id)->update($dataDetailPenjualan);
        return redirect()->route('detail_penjualan.index')->with('success', 'Data Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailPenjualan::find($id)->delete();
        return redirect()->route('detail_penjualan.index')->with('success', 'Data berhasil di hapus');
    }

    // CLASS EXPORT EXCEL DETAIL PENJUALAN
    public function export_excel(Request $request)
    {
        //QUERY, MENGAMBIL DATA DARI DATABASE
        $data = DetailPenjualan::select('*');
        $data = $data->get();

        // Pass parameters to the export class
        $export = new DetailPenjualanExportView($data);
        
        // SET FILE NAME
        $filename = date('YmdHis') . '_detail_penjualan';
        
        // Download the Excel file
        return Excel::download($export, $filename . '.xlsx');
    }

    // CLASS EXPORT PDF DETAIL PENJUALAN
    public function export_pdf() 
    {
        // mengurutkan sesuai abjad 
        $data = DetailPenjualan::orderBy('jumlah_produk', 'asc');
        
        $data = $data->get();

        // Meneruskan parameter ke tampilan ekspor
        $pdf = PDF::loadview('penjualan.export_pdf', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // UNTUK MENENTUKAN NAMA FILE
        $filename = date('YmdHis') . '_detail_penjualan';
        // untuk mendownload file pdf
        return $pdf->download($filename.'.pdf');
    }
}