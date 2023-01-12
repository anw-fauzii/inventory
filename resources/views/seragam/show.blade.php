@extends('layouts.app')

@section('title')
    <title>Seragam Barcode</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Data Barang
                    <div class="page-title-subheading">
                        Data master barang
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        <a class="btn btn-danger" href="{{route('seragam.index')}}"><i class="metismenu-icon pe-7s-back"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div style="text-align:center">
                        jhkjhkjhkjhjk
                        {!! $tamu->keterangan !!}
                        </div>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div>   
@endsection