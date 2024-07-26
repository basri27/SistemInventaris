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
        'no_seri',
        'no_invent'
    ];

    public function invent() {
        return $this->belongsTo(Invent::class);
    }

    public function riwayat_alat() {
        return $this->hasMany(RiwayatAlat::class);
    }
}
