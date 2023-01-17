@extends('layouts.app')

@section('title')
    <title>Barang Masuk</title>
@endsection

@section('content')
<style>
    .order-card {
        color: #fff;
    }

    .bg-c-blue {
        background: linear-gradient(45deg,#4099ff,#73b4ff);
    }

    .bg-c-green {
        background: linear-gradient(45deg,#2ed8b6,#59e0c5);
    }

    .bg-c-yellow {
        background: linear-gradient(45deg,#FFB64D,#ffcb80);
    }

    .bg-c-pink {
        background: linear-gradient(45deg,#FF5370,#ff869a);
    }


    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
        box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
        border: none;
        margin-bottom: 25px;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .card .card-block {
        padding: 25px;
    }

    .order-card i {
        font-size: 26px;
    }

    .f-left {
        float: left;
    }

    .f-right {
        float: right;
    }
</style>

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-cloud-download icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Data Barang Masuk
                    <div class="page-title-subheading">
                        Data transaksi semua barang masuk 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-xl-6">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Pengeluaran</h6>
                    <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>Rp. {{number_format(collect($seragam)->sum('harga_jual'))}}</span></h2>
                    
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Jumlah Stok</h6>
                    <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>{{number_format(collect($seragam)->sum('jumlah'))}}</span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Transaksi</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>{{$seragam->count()}}</span></h2>
                    
                </div>
            </div>
        </div>
        
	</div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        <a class="btn btn-success" href="javascript:void(0)" id="create"><i class="metismenu-icon pe-7s-note2"></i> Filter</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-keluar">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Seragam</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div> 
@include('laporan.filter-m')
<script src="{{asset('js/crud/laporan.js')}}"></script>    
@endsection