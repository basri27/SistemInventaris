<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invent extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'kode',
        'uraian',
        'jumlah',
        'merk',
        'model',
        'supplier',
        'no_po',
        'tgl_perolehan',
        'harga',
        'lokasi',
        'perolehan',
        'kondisi',
        'ket_invent'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function catatan() {
        return $this->hasMany(Catatan::class);
    }
}
