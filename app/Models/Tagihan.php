<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tagihan extends Model
{
    protected $table = 'tagihan';

    protected $fillable = [
        'pelanggan_id',
        'periode',
        'jatuh_tempo',
        'nominal',
        'status',
        'reminder_hmin1_sent_at',
        'reminder_h_sent_at',
        'reminder_hplus1_sent_at',
    ];

    protected $casts = [
        'jatuh_tempo' => 'date',
        'reminder_hmin1_sent_at' => 'datetime',
        'reminder_h_sent_at' => 'datetime',
        'reminder_hplus1_sent_at' => 'datetime',
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
}

