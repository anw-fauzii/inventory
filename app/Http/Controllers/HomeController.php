<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seragam;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $seragam = Seragam::All()->count();
        $hadir = Seragam::where('keterangan',1)->count();
        $tidak = Seragam::where('keterangan',0)->count();
        $kosong = Seragam::where('keterangan', NULL)->count();
        return view('home',compact('hadir','tidak','kosong','seragam'));
    }
    
}
