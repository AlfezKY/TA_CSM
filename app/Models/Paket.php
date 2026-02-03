<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    
    protected $fillable = [
        'Id_Produk',
        'Nama_Produk',
        'Jenis_Produk',
        'Deskripsi_Produk',
        'Harga_Produk',
    ];
}
