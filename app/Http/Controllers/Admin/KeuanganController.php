<?php

namespace App\Http\Controllers\Admin;

use App\Models\Keuangan;
use App\Models\LaporanPdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeuanganController extends Controller
{
    public function index()
    {
        $data['keuangan'] = Keuangan::all();
        $data['laporan'] = LaporanPdf::all();
        return view('keuangan.index',$data);
    }
    public function tambah()
    {
        return view('keuangan.tambah');
    }

    public function post(Request $request)
    {
        $request->validate([
            "tanggal" => 'required|date',
            "kategori" => 'required',
            "jumlah" => 'required',
            "uraian" => 'required',
        ]);

        $keuangan = new Keuangan;
        $keuangan->tanggal=$request->tanggal;
        $keuangan->kategori=$request->kategori;
        $keuangan->jumlah=$request->jumlah;
        $keuangan->uraian=$request->uraian;

        if($keuangan->save()){
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "keuangan berhasil disimpan!"
            ];
            return redirect()->route('keuangan')->with($alert);
        }
        $alert = [
            "tipe" => "alert-danger",
            "pesan" => "keuangan gagal disimpan!"
        ];
        return redirect()->back()->with($alert);
    }

    public function ubah($id)
    {
        $data['keuangan'] = Keuangan::findOrFail($id);
        return view('keuangan.ubah',$data);
    }

    public function put(Request $request, $id)
    {
        $request->validate([
            "tanggal" => 'required|date',
            "kategori" => 'required',
            "jumlah" => 'required',
            "uraian" => 'required',
        ]);
        
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->tanggal=$request->tanggal;
        $keuangan->kategori=$request->kategori;
        $keuangan->jumlah=$request->jumlah;
        $keuangan->uraian=$request->uraian;
        if($keuangan->save()){
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "keuangan berhasil diubah!"
            ];
            return redirect()->route('keuangan')->with($alert);
        }
        $alert = [
            "tipe" => "alert-danger",
            "pesan" => "keuangan gagal diubah!"
        ];
        return redirect()->back()->with($alert);
    }

    public function delete(Request $request, $id)
    {
        $keuangan = Keuangan::findOrFail($id);
        if($keuangan->delete()){
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "Keuangan berhasil dihapus!"
            ];
            return redirect()->back()->with($alert);
        }
        $alert = [
            "tipe" => "alert-danger",
            "pesan" => "Keuangan gagal dihapus!"
        ];
        return redirect()->back()->with($alert);
    }

}