<?php

namespace App\Http\Controllers\Admin;

use App\Models\IbadahHarian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class IbadahHarianController extends Controller
{
    //
    public function index()
    {
        $data['ibadah'] = IbadahHarian::all();
        return view('ibadah.harian.index',$data);
    }
    
    public function tambah()
    {
        return view('ibadah.harian.tambah');
    }

    public function post(Request $request)
    {
        $request->validate([
            "tanggal" => 'required|date',
            "jam" => 'required',
            "kategori" => 'required',
            "posko" => 'required',
            "tempat" => 'required',
            "pemimpin" => 'required',
        ]);

        $ibadah = new IbadahHarian;

        if($request->file('file_liturgi')){   
            $path = Storage::putFileAs('public/ibadah/harian', $request->file('file_liturgi'), $request->file('file_liturgi')->getClientOriginalName());
            $path = explode('/', $path);
            $ibadah->file_liturgi = end($path);
        }

        $ibadah->tanggal = $request->tanggal;
        $ibadah->jam = $request->jam;
        $ibadah->kategori = $request->kategori;
        $ibadah->posko = $request->posko;
        $ibadah->tempat_ibadah = $request->tempat;
        $ibadah->pemimpin_ibadah = $request->pemimpin;

        if($ibadah->save()){
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "Ibadah harian berhasil disimpan!"
            ];
            return redirect()->route('ibadah.harian')->with($alert);
        }
        $alert = [
            "tipe" => "alert-danger",
            "pesan" => "Ibadah harian gagal disimpan!"
        ];
        return redirect()->back()->with($alert);

    }
    public function ubah($id)
    {
        $data['ibadah'] = IbadahHarian::findOrFail($id);
        return view('ibadah.harian.ubah',$data);
    }

    public function put(Request $request, $id)
    {
        $request->validate([
            "tanggal" => 'required|date',
            "jam" => 'required',
            "kategori" => 'required',
            "posko" => 'required',
            "tempat" => 'required',
            "pemimpin" => 'required',
        ]);

        $ibadah = IbadahHarian::findOrFail($id);

        if($request->file('file_liturgi')){   
            Storage::delete('public/ibadah/harian/'.$ibadah->file_liturgi);
            $path = Storage::putFileAs('public/ibadah/harian', $request->file('file_liturgi'), $request->file('file_liturgi')->getClientOriginalName());
            $path = explode('/', $path);
            $ibadah->file_liturgi = end($path);
        }

        $ibadah->tanggal = $request->tanggal;
        $ibadah->jam = $request->jam;
        $ibadah->kategori = $request->kategori;
        $ibadah->posko = $request->posko;
        $ibadah->tempat_ibadah = $request->tempat;
        $ibadah->pemimpin_ibadah = $request->pemimpin;

        if($ibadah->save()){
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "Ibadah harian berhasil diubah!"
            ];
            return redirect()->route('ibadah.harian')->with($alert);
        }
        $alert = [
            "tipe" => "alert-danger",
            "pesan" => "Ibadah harian gagal diubah!"
        ];
        return redirect()->back()->with($alert);
    }

    public function delete(Request $request, $id)
    {
        $ibadah = IbadahHarian::findOrFail($id);
        Storage::delete('public/ibadah/harian/'.$ibadah->file_liturgi);
        if($ibadah->delete()){
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "Ibadah harian berhasil dihapus!"
            ];
            return redirect()->back()->with($alert);
        }
        $alert = [
            "tipe" => "alert-danger",
            "pesan" => "Ibadah harian gagal dihapus!"
        ];
        return redirect()->back()->with($alert);
    }
}