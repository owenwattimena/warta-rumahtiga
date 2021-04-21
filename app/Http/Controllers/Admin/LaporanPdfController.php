<?php

namespace App\Http\Controllers\Admin;

use App\Models\LaporanPdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LaporanPdfController extends Controller
{
    public function tambah(){
        return view('laporanPdf.tambah');
    }
    
    public function post(Request $request)
    {
        $request->validate([
            "tanggal" => 'required|date',
            "pdf" => 'required',
        ]);

        $laporan = new LaporanPdf;

        if($request->file('pdf')){   
            $path = Storage::putFileAs('public/laporan/', $request->file('pdf'), $request->file('pdf')->getClientOriginalName());
            $path = explode('/', $path);
            $laporan->pdf = end($path);
        }
        $laporan->tanggal=$request->tanggal;

        if($laporan->save()){
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "laporan berhasil disimpan!"
            ];
            return redirect()->route('keuangan')->with($alert);
        }
        $alert = [
            "tipe" => "alert-danger",
            "pesan" => "laporan gagal disimpan!"
        ];
        return redirect()->back()->with($alert);
    }

    public function ubah($id)
    {
        $data['laporan'] = LaporanPdf::findOrFail($id);
        return view('laporanPdf.ubah',$data);
    }

    public function put(Request $request, $id)
    {
        $request->validate([
            "tanggal" => 'required|date',
        ]);
        
        $laporan = LaporanPdf::findOrFail($id);

        if($request->file('pdf')){   
            Storage::delete('public/laporan/'.$laporan->pdf);
            $path = Storage::putFileAs('public/laporan', $request->file('pdf'), $request->file('pdf')->getClientOriginalName());
            $path = explode('/', $path);
            $laporan->pdf = end($path);
        }

        $laporan->tanggal=$request->tanggal;

        if($laporan->save()){
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "laporan berhasil diubah!"
            ];
            return redirect()->route('keuangan')->with($alert);
        }
        $alert = [
            "tipe" => "alert-danger",
            "pesan" => "laporan gagal diubah!"
        ];
        return redirect()->back()->with($alert);
    }
    public function delete(Request $request, $id)
    {
        $laporan = LaporanPdf::findOrFail($id);
        Storage::delete('public/laporan/'.$laporan->pdf);
        if($laporan->delete()){
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "laporan berhasil dihapus!"
            ];
            return redirect()->back()->with($alert);
        }
        $alert = [
            "tipe" => "alert-danger",
            "pesan" => "laporan gagal dihapus!"
        ];
        return redirect()->back()->with($alert);
    }
}