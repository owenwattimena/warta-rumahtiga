<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BeritaSepekan;
use App\Http\Controllers\Controller;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['berita'] = BeritaSepekan::all();
        return view('berita.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        try {
            BeritaSepekan::create($request->input());
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "Berita sepekan berhasil disimpan!"
            ];
            return redirect()->route('berita')->with($alert);
        } catch (\Throwable $e) {
            $alert = [
                "tipe" => "alert-danger",
                "pesan" => "Berita sepekan gagal disimpan!"
            ];
            return redirect()->back()->with($alert);
        }
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
        $berita = BeritaSepekan::findOrFail($id);
        return view('berita.edit', ['berita' => $berita]);
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
            'tanggal' => 'required',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        try {
            $berita = BeritaSepekan::findOrFail($id);
            $berita->update($request->input());
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "Berita sepekan berhasil disimpan!"
            ];
            return redirect()->route('berita')->with($alert);
        } catch (\Throwable $e) {
            $alert = [
                "tipe" => "alert-danger",
                "pesan" => "Berita sepekan gagal disimpan!"
            ];
            return redirect()->back()->with($alert);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            BeritaSepekan::findOrFail($id)->delete();
            
            $alert = [
                "tipe" => "alert-success",
                "pesan" => "Berita sepekan berhasil dihapus!"
            ];
            return redirect()->route('berita')->with($alert);
        } catch (\Throwable $e) {
            $alert = [
                "tipe" => "alert-danger",
                "pesan" => "Berita sepekan gagal dihapus!"
            ];
            return redirect()->back()->with($alert);
        }
    }
}