<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use Carbon\Carbon;

class LaporanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','revalidate']);
    }

    public function keluar(Request $request){
        if ($request->ajax()) {
            $startDate = $request->mulai;
            $endDate = $request->selesai;
            $data = BarangKeluar::whereBetween('created_at', [$startDate, $endDate])->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('barang', function($data){
                    return $data->barang->nama." (".$data->barang->ukuran.")";
                })
                ->addColumn('tanggal', function($data){
                    return $data->created_at->isoFormat('D MMMM Y/hh:mm');
                })
                ->rawColumns(['action'])
                ->make(true);
            }
            $startDate = $request->mulai;
            $endDate = $request->selesai;
            $seragam_keluar = BarangKeluar::join('seragam','seragam.id','=','barang_keluar.barang_id')
            ->whereBetween('barang_keluar.created_at', [$startDate, $endDate])->where('rusak', NULL)->get();
            $seragam_rusak = BarangKeluar::join('seragam','seragam.id','=','barang_keluar.barang_id')
            ->whereBetween('barang_keluar.created_at', [$startDate, $endDate])->where('rusak', TRUE)->get();
        return view('laporan.keluar', compact('seragam_keluar','seragam_rusak','startDate','endDate'));
    }

    public function masuk(Request $request){
        if ($request->ajax()) {
            $startDate = $request->mulai;
            $endDate = $request->selesai;
            $data = BarangMasuk::whereBetween('created_at', [$startDate, $endDate])->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('barang', function($data){
                    return $data->barang->nama." (".$data->barang->ukuran.")";
                })
                ->addColumn('tanggal', function($data){
                    return $data->created_at->isoFormat('D MMMM Y/hh:mm');
                })
                ->rawColumns(['action'])
                ->make(true);
            }
            $startDate = $request->mulai;
            $endDate = $request->selesai;
            $seragam = BarangMasuk::join('seragam','seragam.id','=','barang_masuk.barang_id')
            ->whereBetween('barang_masuk.created_at', [$startDate, $endDate])->get();
        return view('laporan.masuk', compact('seragam','startDate','endDate'));
    }
}
