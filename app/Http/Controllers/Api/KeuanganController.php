<?php

namespace App\Http\Controllers\Api;

use App\Models\Keuangan;
use App\Models\LaporanPdf;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keuanganTerakhir = Keuangan::latest()->first();
        $penerimaan = Keuangan::where('kategori', 'penerimaan')->get();
        $pengeluaran = Keuangan::where('kategori', 'pengeluaran')->get();
        $totalPenerimaan = $penerimaan->sum('jumlah');
        $totalPengeluaran = $pengeluaran->sum('jumlah');
        $total = $totalPenerimaan - $totalPengeluaran;
        
        $pdf = LaporanPdf::latest()->first();
        $pdf->pdf = asset('storage/laporan') . '/' . $pdf->pdf;

        $keuangan = [
            'tanggal' => $keuanganTerakhir->tanggal,
            'total' => $total,
            'total_penerimaan' => $totalPenerimaan,
            'total_pengeluaran' => $totalPengeluaran,
            'penerimaan' => $penerimaan,
            'pengeluaran' => $pengeluaran,
            'pdf' => $pdf->pdf
        ];
        return ResponseFormatter::success($keuangan, 'Data keuangan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}