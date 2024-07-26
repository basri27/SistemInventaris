@extends('layouts.user_type.auth')
@section('title', 'Add Data Inventaris - Sistem Inventaris | PT. SCCI')
@section('page-path', 'Add Data Inventaris')
@section('page-title', 'Add Data Inventaris')
@section('content')
    <div>
        <div class="container">
            <a class="btn btn-sm btn-secondary"
                @if (url()->previous() == 'http://localhost/inventaris/barang-masuk') href="{{ route('barang-masuk') }}"
                @elseif(url()->previous() == 'http://localhost/inventaris/barang-keluar') href="{{ route('barang-keluar') }}" @endif>Back</a>
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
                        <form action="{{ route('create-barang') }}" method="POST" class="container">
                            @csrf
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Kelompok</label>
                                    <select name="kelompok" id="kelompok" class="form-select form-select-sm">
                                        <option disabled selected hidden>Pilih kelompok alat inventaris</option>
                                        @foreach ($kelompok as $item)
                                            <option value="{{ $item->id }}">[{{ $item->cat_code }}]
                                                {{ $item->kelompok }} |
                                                {{ $item->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Kode</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" name="kode_kelompok"
                                            value="{{ old('kode_kelompok') }}" placeholder="Kode sub kelompok alat/barang">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Uraian/Nama Alat</label>
                                    <input type="text" class="form-control form-control-sm" name="nama_alat"
                                        value="{{ old('nama_alat') }}" placeholder="Nama alat/barang inventaris">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Jumlah</label>
                                    <input type="number" min="0" class="form-control form-control-sm" name="jumlah"
                                        value="{{ old('jumlah') }}" placeholder="Jumlah alat/barang inventaris">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Merk</label>
                                    <input type="text" class="form-control form-control-sm" name="merk"
                                        value="{{ old('merk') }}" placeholder="Merk alat/barang inventaris">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Model/Type</label>
                                    <input type="text" class="form-control form-control-sm" name="model"
                                        value="{{ old('model') }}" placeholder="Model/type alat inventaris">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Supplier</label>
                                    <input type="text" class="form-control form-control-sm" name="supplier"
                                        value="{{ old('supplier') }}" placeholder="Nama supplier alat/barang">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">No. Purchase Order (PO)</label>
                                    <input type="text" class="form-control form-control-sm" name="no_po"
                                        value="{{ old('no_po') }}" placeholder="Nomor PO alat/barang inventaris">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Tgl. Perolehan</label>
                                    <input type="date" class="form-control form-control-sm" name="tgl_perolehan"
                                        value="{{ old('tgl_perolehan') }}">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Harga (Rp)</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-text">Rp.</div>
                                        <input type="text" class="form-control" name="harga"
                                            value="{{ old('harga') }}" placeholder="Harga alat/barang inventaris">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Lokasi</label>
                                    <input type="text" class="form-control form-control-sm" name="lokasi"
                                        value="{{ old('lokasi') }}" placeholder="Lokasi alat/barang inventaris">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Perolehan</label>
                                    <input type="text" class="form-control form-control-sm" name="perolehan"
                                        value="{{ old('perolehan') }}" placeholder="Perolehan alat/barang inventaris">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Kondisi</label>
                                    <input type="text" class="form-control form-control-sm" name="kondisi"
                                        value="{{ old('kondisi') }}" placeholder="Kondisi alat/barang inventaris">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="" class="mb-0">Keterangan</label>
                                    <select name="ket_invent" id="ket_invent" class="form-select form-select-sm">
                                        <option value="" disabled selected hidden>Pilih ket. alat masuk/keluar
                                        </option>
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
    <script>
        function selectedKelompok() {
            var e = document.getElementById('kelompok');
            var selectedVal = e.options[e.selectedIndex].value;

            var kode = document.getElementById('kode');
            let barang = <?php echo json_encode($kelompok); ?>
            barang.forEach(element => {
                console.log(element);
            });
        }
    </script>
@endsection
