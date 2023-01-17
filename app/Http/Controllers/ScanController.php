<?php

namespace App\Http\Controllers;

use App\Models\Seragam;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function create($id){
        $seragam = Seragam::where('qr_code', $id)->firstOrFail();
        return view('seragam.scan', compact('seragam'));
    }

    public function store(Request $request){
        $nama = BarangKeluar::create(
            [
                'barang_id' => $request->id,
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan
            ]
        );
        $seragam = Seragam::findOrfail($request->id);
            $seragam->stok -= $request->jumlah;
            $seragam->save();
        
        return redirect()->back()->with('sukses','Pengambilan Barang Sudah Dicatat');
    }


}
