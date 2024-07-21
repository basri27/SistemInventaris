<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_code',
        'cat_name'
    ];

    public function invent() {
        return $this->hasMany(Invent::class);
    }
}
