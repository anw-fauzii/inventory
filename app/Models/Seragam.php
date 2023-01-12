<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seragam extends Model
{
    use HasFactory;
    protected $table = "seragam";
    protected $fillable = [
        'qr_code','nama','ukuran','harga_beli','harga_jual','stok','keterangan',
    ];

    public function barang_keluar(){
        return $this->hasMany(BarangKeluar::class);
    }

    public function barang_masuk(){
        return $this->hasMany(BarangMasuk::class);
    }
}