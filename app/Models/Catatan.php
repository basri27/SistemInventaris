<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'invent_id',
        'no_formulir',
        'edisi',
        'revisi',
        'no_resi',
        'no_invent',
        'log_date',
        'perawatan_berkala',
        'kalibrasi',
        'pelumasan',
        'ganti_sparepart',
        'overhaul',
        'pic',
        'ket_log'
    ];

    public function invent() {
        return $this->belongsTo(Invent::class);
    }
}
