<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    
    protected $fillable = [
        'nama_lengkap',
        'paket',
        'nomor_telepon',
        'alamat',
        'jatuh_tempo',
        'status_pembayaran',
    ];
    
    protected $casts = [
        'jatuh_tempo' => 'date',
    ];

    /**
     * Scope: pelanggan yang muncul di laman tagihan.
     * Kriteria: status_pembayaran = 'Belum Lunas' DAN jatuh_tempo >= hari ini.
     */
    public function scopeJatuhTempo($query)
    {
        return $query
            ->where('status_pembayaran', 'Belum Lunas')
            ->whereDate('jatuh_tempo', '>=', Carbon::today());
    }

    public function tagihan(): HasMany
    {
        return $this->hasMany(Tagihan::class, 'pelanggan_id');
    }
}
