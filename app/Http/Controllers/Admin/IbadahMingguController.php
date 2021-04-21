<?php

namespace App\Http\Controllers\Admin;

use App\Models\IbadahMinggu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class IbadahMingguController extends Controller
{
    public function index()
    {
        $data['ibadah'] = IbadahMinggu::all();
        return view('ibadah.minggu.index',$data);
    }
    
    public function tambah()
    {
        return view('ibadah.minggu.tambah');
    }
    public function post(Request $request)
    {
        $request->validate([
            "tanggal" => 'required|date',
            "jam" => 'required',
            "tempat" => 'required',
            "pemimpin" => 'required',
        ]);

        $ibadah = new IbadahMinggu;

        if($request->file('file_liturgi')){   
            $path = Storage::putFileAs('public/ibadah/minggu', $request->file('file_liturgi'), $request->file('file_liturgi')->getClientOriginalName());
            $path = explode('/', $path);
            $ibadah->file_liturgi = end($path);
        }

        $ibadah->tanggal = $request->tanggal;
        $ibadah->jam = $request->jam;
        $ibadah->tempat_ibadah = $request->tempat;
        $ibadah->pemimpin_ibadah = $request->pemimpin;

        if($ibadah->save()){
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "Ibadah minggu berhasil disimpan!"
            ];
            return redirect()->route('ibadah.minggu')->with($alert);
        }
        $alert = [
            "tipe" => "alert-danger",
            "pesan" => "Ibadah minggu gagal disimpan!"
        ];
        return redirect()->back()->with($alert);

    }

    public function ubah($id)
    {
        $data['ibadah'] = IbadahMinggu::findOrFail($id);
        return view('ibadah.minggu.ubah',$data);
    }

    public function put(Request $request, $id)
    {
        $request->validate([
            "tanggal" => 'required|date',
            "jam" => 'required',
            "tempat" => 'required',
            "pemimpin" => 'required',
        ]);

        $ibadah = IbadahMinggu::findOrFail($id);
        if($request->file('file_liturgi')){   
            Storage::delete('public/ibadah/minggu/'.$ibadah->file_liturgi);
            $path = Storage::putFileAs('public/ibadah/minggu', $request->file('file_liturgi'), $request->file('file_liturgi')->getClientOriginalName());
            $path = explode('/', $path);
            $ibadah->file_liturgi = end($path);
        }

        $ibadah->tanggal = $request->tanggal;
        $ibadah->jam = $request->jam;
        $ibadah->tempat_ibadah = $request->tempat;
        $ibadah->pemimpin_ibadah = $request->pemimpin;

        if($ibadah->save()){
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "Ibadah minggu berhasil diubah!"
            ];
            return redirect()->route('ibadah.minggu')->with($alert);
        }
        $alert = [
            "tipe" => "alert-danger",
            "pesan" => "Ibadah minggu gagal diubah!"
        ];
        return redirect()->back()->with($alert);
    }

    public function delete(Request $request, $id)
    {
        $ibadah = IbadahMinggu::findOrFail($id);
        Storage::delete('public/ibadah/minggu/'.$ibadah->file_liturgi);
        if($ibadah->delete()){
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "Ibadah minggu berhasil dihapus!"
            ];
            return redirect()->back()->with($alert);
        }
        $alert = [
            "tipe" => "alert-danger",
            "pesan" => "Ibadah minggu gagal dihapus!"
        ];
        return redirect()->back()->with($alert);
    }
}