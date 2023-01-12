<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = "barang_masuk";
    protected $fillable = [
        'barang_id','jumlah','keterangan',
    ];

    public function barang(){
        return $this->belongsTo(Seragam::class);
    }
}
