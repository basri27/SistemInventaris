@extends('layouts.user_type.auth')
@section('title', 'Edit Data Inventaris - Sistem Inventaris | PT. SCCI')
@section('page-path', 'Edit Data Inventaris')
@section('page-title', 'Edit Data Inventaris')
@section('content')
    <div>
        <div class="container">
            <a href="{{ route('barang-masuk') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
        <div class="row">

            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Form Edit Data Inventaris</h5>
                                <hr class="mt-0">
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('update-barang', $invent->id) }}" class="container" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Kelompok</label>
                                    <select name="kelompok" id="" class="form-select form-select-sm">
                                        <option value="{{ $invent->category_id }}" selected hidden>
                                            [{{ $invent->category->cat_code }}] {{ $invent->category->kelompok }} |
                                            {{ $invent->category->cat_name }}
                                        </option>
                                        @foreach ($kelompok as $item)
                                            <option value="{{ $item->id }}">[{{ $item->cat_code }}]
                                                {{ $item->kelompok }} |
                                                {{ $item->cat_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Kode</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="kode_kelompok" class="form-control"
                                            value="{{ $invent->kode }}">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Uraian/Nama Alat</label>
                                    <input type="text" name="nama_alat" class="form-control form-control-sm"
                                        value="{{ $invent->uraian }}">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Jumlah</label>
                                    <input type="number" min="0" name="jumlah" class="form-control form-control-sm"
                                        value="{{ $invent->jumlah }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Merk</label>
                                    <input type="text" name="merk" class="form-control form-control-sm"
                                        value="{{ $invent->merk }}">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Model/Type</label>
                                    <input type="text" name="model" class="form-control form-control-sm"
                                        value="{{ $invent->model }}">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Supplier</label>
                                    <input type="text" name="supplier" class="form-control form-control-sm"
                                        value="{{ $invent->supplier }}">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">No. Purchase Order (PO)</label>
                                    <input type="text" name="no_po" class="form-control form-control-sm"
                                        value="{{ $invent->no_po }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Tgl. Perolehan</label>
                                    <input type="date" name="tgl_perolehan" class="form-control form-control-sm"
                                        value="{{ $invent->tgl_perolehan }}">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Harga (Rp)</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-text">Rp.</div>
                                        <input type="text" name="harga" class="form-control"
                                            value="{{ $invent->harga }}">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control form-control-sm"
                                        value="{{ $invent->lokasi }}">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Perolehan</label>
                                    <input type="text" name="perolehan" class="form-control form-control-sm"
                                        value="{{ $invent->perolehan }}">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Kondisi</label>
                                    <input type="text" name="kondisi" class="form-control form-control-sm"
                                        value="{{ $invent->kondisi }}">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Keterangan</label>
                                    <select name="ket_invent" id="" class="form-select form-select-sm">
                                        <option value="{{ $invent->ket_invent }}" selected hidden>
                                            {{ $invent->ket_invent }}</option>
                                        <option value="MASUK">MASUK</option>
                                        <option value="KELUAR">KELUAR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center pt-3">
                                <button type="submit" class="btn btn-sm btn-info col-12">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')

@endsection
