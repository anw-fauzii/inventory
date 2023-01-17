<?php

namespace App\Http\Controllers;

use App\Models\Seragam;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class BarangKeluarController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BarangKeluar::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="metismenu-icon pe-7s-trash"></i></a>';
                    return $btn;
                })
                ->addColumn('barang', function($data){
                    return $data->barang->nama." (".$data->barang->ukuran.")";
                })
                ->addColumn('tanggal', function($data){
                    return $data->created_at->isoFormat('D MMMM Y/hh:mm');
                })
                ->rawColumns(['action'])
                ->make(true);
            }
        $seragam = Seragam::all();
        return view('barang-keluar.index', compact('seragam'));
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
        $validator = Validator::make($request->all(), [
            'barang_id' => 'required',
            'jumlah' => 'required',
        ], $messages = [
            'barang_id.required' => 'Kolom Nama Barang Wajib Diisi',
            'jumlah.required' => 'Kolom Jumlah Wajib Diisi',
        ]);
        if($validator->passes()) {
            if($request->rusak){
                $ket = "Rusak";
            }else{
                $ket = $request->keterangan;
            }
            $nama = BarangKeluar::updateOrCreate(
                ['id' => $request->id],
                [
                    'barang_id' => $request->barang_id,
                    'jumlah' => $request->jumlah,
                    'keterangan' => $ket,
                    'rusak' => $request->rusak
                ]
            );
            $seragam = Seragam::findOrfail($request->barang_id);
            $seragam->stok -= $request->jumlah;
            $seragam->save();

            return response()->json($nama);
        }
        return response()->json(['error'=>$validator->errors()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Barang = BarangKeluar::find($id);
        return response()->json($Barang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $Barang = BarangKeluar::find($id);
        $Barang->delete();
        $seragam = Seragam::findOrfail($Barang->barang_id);
            $seragam->stok += $Barang->jumlah;
            $seragam->save();
        return response()->json($Barang);
    }
}
