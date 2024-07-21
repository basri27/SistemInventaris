<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invent;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dataInventaris() {
        $invents = Invent::orderBy('kode', 'asc')->get();

        return view('inventaris', compact('invents'));
    }

    public function addDataInventaris() {
        $kelompok = Category::get();

        return view('crud.inventaris-add', compact('kelompok'));
    }

    public function editDataInventaris($id) {
        $invent = Invent::find($id);
        $kelompok = Category::get();

        return view('crud.inventaris-edit', compact('invent', 'kelompok'));
    }
}
