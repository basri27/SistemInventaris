@extends('layouts.user_type.auth')
@section('title', 'Add Data Inventaris - Sistem Inventaris | PT. SCCI')
@section('page-path', 'Add Data Inventaris')
@section('page-title', 'Add Data Inventaris')
@section('content')
    <div>
        <div class="container">
            <a href="{{ route('data-inventaris') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Form Create Data Inventaris</h5>
                                <hr class="mt-0">
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="" class="container">
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Kelompok</label>
                                    <select name="" id="" class="form-select form-select-sm">
                                        <option hidden>Pilih kelompok alat inventaris</option>
                                        @foreach ($kelompok as $item)
                                            <option value="$item->id">[{{ $item->cat_code }}] {{ $item->kelompok }} |
                                                {{ $item->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Kode</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-text">1.01</div>
                                        <input type="text" class="form-control"
                                            placeholder="Kode sub kelompok alat/barang">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Uraian/Nama Alat</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Nama alat/barang inventaris">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Jumlah</label>
                                    <input type="number" min="0" class="form-control form-control-sm"
                                        placeholder="Jumlah alat/barang inventaris">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Merk</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Merk alat/barang inventaris">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Model/Type</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Model/type alat inventaris">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Supplier</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Nama supplier alat/barang">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">No. Purchase Order (PO)</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Nomor PO alat/barang inventaris">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Tgl. Perolehan</label>
                                    <input type="date" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Harga (Rp)</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-text">Rp.</div>
                                        <input type="text" class="form-control"
                                            placeholder="Harga alat/barang inventaris">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Lokasi</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Lokasi alat/barang inventaris">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Perolehan</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Perolehan alat/barang inventaris">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Kondisi</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Kondisi alat/barang inventaris">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Keterangan</label>
                                    <select name="" id="" class="form-select form-select-sm">
                                        <option value="" selected hidden>Pilih ket. alat masuk/keluar</option>
                                        <option value="MASUK">Masuk</option>
                                        <option value="KELUAR">Keluar</option>
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
