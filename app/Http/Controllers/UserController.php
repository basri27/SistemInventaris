<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Category;
use App\Models\Invent;
use App\Models\RiwayatAlat;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profil() {
        return view('laravel-examples/user-profile');
    }
    
    public function barangMasuk() {
        $invents = Invent::where('ket_invent', 'MASUK')->orderBy('kode', 'asc')->get();

        return view('barang-masuk', compact('invents'));
    }

    public function barangKeluar() {
        $invents = Invent::where('ket_invent', 'KELUAR')->orderBy('kode', 'asc')->get();

        return view('barang-keluar', compact('invents'));
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

    public function createBarang(Request $request) {
        Invent::create([
            'category_id' => $request->input('kelompok'),
            'kode' => $request->input('kode_kelompok'),
            'uraian' => $request->input('nama_alat'),
            'jumlah' => $request->input('jumlah'),
            'merk' => $request->input('merk'),
            'model' => $request->input('model'),
            'supplier' => $request->input('supplier'),
            'no_po' => $request->input('no_po'),
            'tgl_perolehan' => $request->input('tgl_perolehan'),
            'harga' => $request->input('harga'),
            'lokasi' => $request->input('lokasi'),
            'perolehan' => $request->input('perolehan'),
            'lokasi' => $request->input('kondisi'),
            'ket_invent' => $request->input('ket_invent')
        ]);

        if($request->input('ket_invent') == 'MASUK') {
            return redirect()->route('barang-masuk')->with('success', 'Data berhasil ditambahkan!');
        } else if($request->input('ket_input') == 'KELUAR') {
            return redirect()->route('barang-keluar')->with('success', 'Data berhasil ditambahkan!');
        }
    }

    public function printBarangMasuk() {
        $invents = Invent::where('ket_invent', 'MASUK')->orderBy('kode', 'asc')->get();

        return view('print.print-barang-masuk', compact('invents'));
    }

    public function printBarangKeluar() {
        $invents = Invent::where('ket_invent', 'KELUAR')->orderBy('kode', 'asc')->get();

        return view('print.print-barang-keluar', compact('invents'));
    }

    public function catatanRiwayatAlat() {
        $invents = Invent::with('catatan')->orderBy('kode', 'asc')->get();

        return view('catatan-alat', compact('invents'));
    }

    public function catatanAlatAdd($id) {
        $catatan = Catatan::where('invent_id', $id)->first();
        if($catatan != null) {
            $riwayats = RiwayatAlat::where('catatan_id', $catatan->id)->get();

            return view('crud.catatan-alat-add', compact('catatan', 'riwayats', 'id'));
        }else {
            return view('crud.catatan-alat-add', compact('catatan', 'id'));
        }
    }

    public function catatanAlatEdit($id) {
        $catatan = Catatan::where('invent_id', $id)->first();
        if($catatan != null) {
            $riwayats = RiwayatAlat::where('catatan_id', $catatan->id)->get();

            return view('crud.catatan-alat-edit', compact('catatan', 'riwayats', 'id'));
        }else {
            return view('crud.catatan-alat-edit', compact('catatan', 'id'));
        }
    }

    public function printRiwayatAlat($id) {
        $catatan = Catatan::find($id);
        if($catatan != null) {
            $riwayats = RiwayatAlat::where('catatan_id', $catatan->id)->get();

            return view('print.print-riwayat-alat', compact('catatan', 'riwayats'));
        }else {
            return view('print.print-riwayat-alat', compact('catatan'));
        }
    }

    public function addFormulirCatatan(Request $request, $id) {
        $catatan = Catatan::create([
            'invent_id' => $id,
            'no_formulir' => $request->input('no_formulir'),
            'edisi' => $request->input('edisi'),
            'revisi' => $request->input('revisi'),
            'no_seri' => $request->input('seri'),
            'no_invent' => $request->input('no_invent')
        ]);

        return redirect()->back()->with(['catatan', $catatan]);
    }

    public function createCatatanAlat(Request $request, $id) {
        RiwayatAlat::create([
            'catatan_id' => $id,
            'tgl_riwayat' => $request->input('tgl_riwayat'),
            'perawatan_berkala' => $request->input('perawatan_berkala'),
            'kalibrasi' => $request->input('kalibrasi'),
            'pelumasan' => $request->input('pelumasan'),
            'ganti_sparepart' => $request->input('ganti_sparepart'),
            'overhaul' => $request->input('overhaul'),
            'pic' => $request->input('pic'),
            'ket_log' => $request->input('ket_log')
        ]);

        return redirect()->back();
    }

    public function updateCatatanAlat(Request $request, $id) {
        $riwayat = RiwayatAlat::find($id);
        $riwayat->update([
            'tgl_riwayat' => $request->input('tgl_riwayat'),
            'perawatan_berkala' => $request->input('perawatan_berkala'),
            'kalibrasi' => $request->input('kalibrasi'),
            'pelumasan' => $request->input('pelumasan'),
            'ganti_sparepart' => $request->input('ganti_sparepart'),
            'overhaul' => $request->input('overhaul'),
            'pic' => $request->input('pic'),
            'ket_log' => $request->input('ket_log')
        ]);

        return redirect()->back();
    }

    public function deleteCatatanAlat($id) {
        $invent = Invent::find($id);
        $catatan = Catatan::where('invent_id', $invent->id)->first();
        
       $riwayats = RiwayatAlat::where('catatan_id', $catatan->id)->get();
       foreach ($riwayats as $item) {
            $item->delete();
       }
       $catatan->delete();

       return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
