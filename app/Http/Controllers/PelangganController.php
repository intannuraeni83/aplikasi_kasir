<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('data_pelanggan.index', compact('pelanggan'));
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
        // VALIDASI UNTUK INPUT DATA PENGGUNA 
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telpon' => 'required',
        ],[
            'nama_pelanggan.required' => 'Nama wajib di isi',
            'alamat.required' => 'Alamat wajib di isi',
            'nomor_telpon.required' => 'Nomor telepon wajib di isi',
        ]); 

        $pelanggan = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'nomor_telpon' => $request->nomor_telpon
        ];

        // dd($pelanggan);
        Pelanggan::create($pelanggan);
        return redirect()->route('pelanggan.index')->with('success', 'Data Berhasil disimpan');
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
        // VALIDASI UNTUK INPUT DATA PENGGUNA 
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telpon' => 'required'
        ],[
            'nama_pelanggan.required' => 'Nama wajib di isi',
            'alamat.required' => 'Alamat wajib di isi',
            'nomor_telpon.required' => 'Nomor telepon wajib di isi'
        ]); 

        $pelanggan = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'nomor_telpon' => $request->nomor_telpon
        ];

        Pelanggan::find($id)->update($pelanggan);
        return redirect()->route('pelanggan.index')->with('success', 'Data Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::find($id)->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil di hapus');
    }

    public function export_pdf() 
    {
        // mengurutkan sesuai abjad 
        $pelanggan = Pelanggan::orderBy('nama_pelanggan', 'asc');
        
        $pelanggan = $pelanggan->get();

        // Meneruskan parameter ke tampilan ekspor
        $pdf = PDF::loadview('pelanggan.export_pdf', ['pelanggan'=>$pelanggan]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // UNTUK MENENTUKAN NAMA FILE
        $filename = date('YmdHis') . '_pelanggan';
        // untuk mendownload file pdf
        return $pdf->download($filename.'.pdf');
    }
}