<?php

namespace App\Http\Controllers\Api;

use App\Models\IbadahHarian;
use App\Models\IbadahMinggu;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class IbadahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function minggu(Request $request)
    {
        $ibadah = IbadahMinggu::query();
        if($request->input('search')){
            $ibadah->where(function($query) use ($request){
                $query->orWhere('tempat_ibadah', 'LIKE', '%'. $request->input('search') . '%')
                ->orWhere('pemimpin_ibadah', 'LIKE', '%'. $request->input('search') . '%');
            });
        }
        $ibadah = $ibadah->get();
        foreach ($ibadah as $item) {
            $arrJam = explode(':', $item->jam);
            $item->jam = $arrJam[0] . ':' . $arrJam[1];
            if($item->file_liturgi){
                $item->file_liturgi = asset('storage/ibadah/minggu') . '/' . $item->file_liturgi;
            }
        }
        return ResponseFormatter::success($ibadah, 'Ibadah Minggu');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function harian(Request $request)
    {
        $ibadah = IbadahHarian::query();
        if($request->input('kategori')){
            $ibadah->where('kategori', $request->input('kategori'));
        }
        if($request->input('search')){
            $ibadah->where(function($query) use ($request){
                $query->orWhere('tempat_ibadah', 'LIKE', '%'. $request->input('search') . '%')
                ->orWhere('pemimpin_ibadah', 'LIKE', '%'. $request->input('search') . '%')
                ->orWhere('posko', 'LIKE', '%'. $request->input('search') . '%');
            });
        }

        $ibadah = $ibadah->get();
        
        foreach ($ibadah as $item) {
            $arrJam = explode(':', $item->jam);
            $item->jam = $arrJam[0] . ':' . $arrJam[1];
            if($item->file_liturgi){
                $item->file_liturgi = asset('storage/ibadah/harian') . '/' . $item->file_liturgi;
            }

        }
        return ResponseFormatter::success($ibadah, 'Ibadah Harian');
    }

    
}