<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenjualanExportView;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $penjualan = Penjualan::with('pelanggan')->get();
        return view('data_penjualan.index', compact('penjualan', 'pelanggan'));
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
        // VALIDASI UNTUK INPUT DATA PENJUALAN
        $request->validate([
            'tanggal_penjualan' => 'required',
            'total_harga' => 'required',
            'pelanggan_id' => 'required'
        ],[
            'tanggal_penjualan.required' => 'Tanggal penjualan wajib di isi',
            'total_harga.required' => 'Total harga wajib di isi',
            'pelanggan_id.required' => 'Nama Pelanggan wajib di isi',
        ]);

        $penjualan = [
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'total_harga' => $request->total_harga,
            'pelanggan_id' => $request->pelanggan_id,
        ];

        Penjualan::create($penjualan);
        return redirect()->route('penjualan.index')->with('success', 'Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'tanggal_penjualan' => 'required', 
            'total_harga' => 'required',
            'pelanggan_id' => 'required'
        ],
        [
            'tanggal_penjualan.required' => 'Tanggal penjualan wajib di isi',
            'total_harga.required' => 'Total harga wajib di isi',
            'pelanggan_id.required' => 'Nama Pelanggan wajib di isi'
        ]);

        $penjualan = [
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'total_harga' => $request->total_harga,
            'pelanggan_id' => $request->pelanggan_id
        ];

        Penjualan::find($id)->update($penjualan);
        return redirect()->route('penjualan.index')->with('success', 'Data Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Penjualan::find($id)->delete();
        return redirect()->route('penjualan.index')->with('info', 'Data tidak dapat dihapus');
    }

    public function export_pdf() 
    {
        // mengurutkan sesuai abjad 
        $data = Penjualan::orderBy('tanggal_penjualan', 'asc');
        
        $data = $data->get();

        // Meneruskan parameter ke tampilan ekspor
        $pdf = PDF::loadview('penjualan.export_pdf', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // UNTUK MENENTUKAN NAMA FILE
        $filename = date('YmdHis') . '_penjualan';
        // untuk mendownload file pdf
        return $pdf->download($filename.'.pdf');
    }

     //CLASS EXPORT EXCEL PENJUALAN
     public function export_excel(Request $request)
     {
         //QUERY, MENGAMBIL DATA DARI DATABASE
         $data = Penjualan::select('*');
         $data = $data->get();
 
         // Pass parameters to the export class
         $export = new PenjualanExportView($data);
         
         // SET FILE NAME
         $filename = date('YmdHis') . '_produk';
         
         // Download the Excel file
         return Excel::download($export, $filename . '.xlsx');
     }
}