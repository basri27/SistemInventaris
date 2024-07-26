<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatAlat extends Model
{
    use HasFactory;

    protected $fillable = [
        'catatan_id',
        'tgl_riwayat',
        'perawatan_berkala',
        'kalibrasi',
        'pelumasan',
        'ganti_sparepart',
        'overhaul',
        'pic',
        'ket_log'
    ];

    public function catatan() {
        return $this->belongsTo(Catatan::class);
    }
}
