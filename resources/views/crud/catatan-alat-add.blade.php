@extends('layouts.user_type.auth')
@section('title', 'Add Data Catatan Riwayat Alat - Sistem Inventaris | PT. SCCI')
@section('page-path', 'Add Data Catatan Riwayat Alat')
@section('page-title', 'Add Data Catatan Riwayat Alat')
@section('content')
    <div>
        <div class="container">
            <a class="btn btn-sm btn-secondary" href="{{ route('catatan-riwayat-alat') }}">Back</a>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($catatan == null)
                    <div class="card mb-4 mx-4">
                        <div class="card-header pb-0">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="mb-0">Input Kartu Catatan Riwayat Alat</h5>
                                    <hr class="mt-0">
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-0 pt-0">
                            <div class="mb-2 container">
                                <form action="{{ route('add-formulir-catatan', $id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="" class="mb-0">No. Formulir</label>
                                            <input type="text" name="no_formulir" id=""
                                                class="form-control form-control-sm mb-2">
                                        </div>
                                        <div class="col-md-1">
                                            <label for="" class="mb-0">Edisi</label>
                                            <input type="text" name="edisi" id=""
                                                class="form-control form-control-sm mb-2">
                                        </div>
                                        <div class="col-md-1">
                                            <label for="" class="mb-0">Revisi</label>
                                            <input type="text" name="revisi" id=""
                                                class="form-control form-control-sm mb-2">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="mb-0">No. Seri</label>
                                            <input type="text" name="seri" id=""
                                                class="form-control form-control-sm mb-2">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="mb-0">No. Inventaris</label>
                                            <input type="text" name="no_invent" id=""
                                                class="form-control form-control-sm mb-2">
                                        </div>
                                        <div class="container pt-2">
                                            <button class="btn btn-sm col-12 container btn-info">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($catatan != null)
                    <div class="card mb-4 mx-4">
                        <div class="card-header pb-0">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="mb-0">Input Data Catatan Riwayat Alat</h5>
                                    <hr class="mt-0">
                                </div>
                                <div>
                                    <a href="{{ route('print-riwayat-alat', $catatan->id) }}" class="btn btn-sm btn-danger"
                                        target="_blank">Print</a>
                                    <a href="#new-data" data-bs-toggle="modal" class="btn btn-sm btn-info">New Data</a>
                                </div>

                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">

                            <div class="table-responsive mb-2">
                                <table
                                    class="table table-bordered border border-dark text-xs text-dark w-auto align-middle mt-0 m-4">
                                    <tr>
                                        <td rowspan="2" colspan="2" class="w-9"><img
                                                src="{{ asset('assets/img/logo-scci.png') }}"
                                                style="width: 100%; height:100%">
                                        </td>
                                        <th rowspan="2" colspan="5" class="text-center">KARTU CATATAN RIWAYAT ALAT
                                        </th>
                                        <td colspan="2">
                                            <table class="table-borderless">
                                                <tr>
                                                    <td>Nomor Formulir</td>
                                                    <td>:</td>
                                                    <td>{{ $catatan->no_formulir }}</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table class="table-borderless">
                                                <tr>
                                                    <td>Edisi/Revisi</td>
                                                    <td>:</td>
                                                    <td>
                                                        {{ $catatan->edisi }}/{{ $catatan->revisi }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Nama Alat</th>
                                        <td colspan="7">{{ $catatan->invent->uraian }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Merk/Type</th>
                                        <td colspan="7">
                                            {{ $catatan->invent->merk }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">No. Seri</th>
                                        <td colspan="7">
                                            {{ $catatan->no_seri }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">No. Inventaris</th>
                                        <td colspan="7">
                                            {{ $catatan->no_invent }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Lokasi Alat</th>
                                        <td colspan="7">
                                            {{ $catatan->invent->lokasi }}
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <th rowspan="2">No.</th>
                                        <th rowspan="2">Tanggal</th>
                                        <th colspan="5" class="text-center">Catatan Riwayat Alat<sup>(*)</sup></th>
                                        <th rowspan="2">PIC</th>
                                        <th rowspan="2">Keterangan</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th>Perawatan Berkala</th>
                                        <th>Kalibrasi</th>
                                        <th>Pelumasan/Ganti Oli</th>
                                        <th>Ganti Sparepart</th>
                                        <th>Overhaull</th>
                                    </tr>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($riwayats as $item)
                                        <tr class="text-center">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tgl_riwayat)->format('d-m-Y') }}
                                            </td>
                                            <td>
                                                @if ($item->perawatan_berkala != null)
                                                    <i class="fas fa-check"></i>
                                                @else
                                                    <i class="fas fa-times"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->kalibrasi != null)
                                                    <i class="fas fa-check"></i>
                                                @else
                                                    <i class="fas fa-times"></i>
                                                @endif
                                            <td>
                                                @if ($item->pelumasan != null)
                                                    <i class="fas fa-check"></i>
                                                @else
                                                    <i class="fas fa-times"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->ganti_sparepart != null)
                                                    <i class="fas fa-check"></i>
                                                @else
                                                    <i class="fas fa-times"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->overhaul != null)
                                                    <i class="fas fa-check"></i>
                                                @else
                                                    <i class="fas fa-times"></i>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $item->pic != null ? $item->ket_log : '-' }}
                                            </td>
                                            <td>
                                                {{ $item->ket_log != null ? $item->ket_log : '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr></tr>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end text-center">
                                <p class="text-xs fw-bold m-4">
                                    Muara Teweh,
                                    {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('d F Y') }}
                                    <br>
                                    For and on behalf of<br>
                                    PT.CURVEYOR CARBON CONSULTING INDONESIA<br><br><br><br><br>
                                    <u>Akhsan Huzaimah</u><br>
                                    Branch Manager
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if ($catatan != null)
        <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="new-data">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <form action="{{ route('create-catatan-alat', $catatan->id) }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header m-2">
                            <h5 class="modal-title">Tambah Data Catatan Riwayat Alat</h5>
                            <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <table
                                class="table table-bordered border border-dark text-xs text-dark w-auto align-middle m-2 bg-light">
                                <tr>
                                    <td rowspan="2" colspan="2" class="w-9"><img
                                            src="{{ asset('assets/img/logo-scci.png') }}"
                                            style="width: 100%; height:100%">
                                    </td>
                                    <th rowspan="2" colspan="5" class="text-center">KARTU CATATAN RIWAYAT ALAT
                                    </th>
                                    <td colspan="2">
                                        <table class="table-borderless">
                                            <tr>
                                                <td>Nomor Formulir</td>
                                                <td>:</td>
                                                <td>{{ $catatan->no_formulir }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table class="table-borderless">
                                            <tr>
                                                <td>Edisi/Revisi</td>
                                                <td>:</td>
                                                <td>
                                                    {{ $catatan->edisi }}/{{ $catatan->revisi }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">Nama Alat</th>
                                    <td colspan="7">{{ $catatan->invent->uraian }}</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Merk/Type</th>
                                    <td colspan="7">
                                        {{ $catatan->invent->merk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">No. Seri</th>
                                    <td colspan="7">
                                        {{ $catatan->no_seri }}
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">No. Inventaris</th>
                                    <td colspan="7">
                                        {{ $catatan->no_invent }}
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">Lokasi Alat</th>
                                    <td colspan="7">
                                        {{ $catatan->invent->lokasi }}
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th rowspan="2">No.</th>
                                    <th rowspan="2">Tanggal</th>
                                    <th colspan="5" class="text-center">Catatan Riwayat Alat<sup>(*)</sup></th>
                                    <th rowspan="2">PIC</th>
                                    <th rowspan="2">Keterangan</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Perawatan Berkala</th>
                                    <th>Kalibrasi</th>
                                    <th>Pelumasan/Ganti Oli</th>
                                    <th>Ganti Sparepart</th>
                                    <th>Overhaull</th>
                                </tr>
                                <tr class="text-center">
                                    <td>#</td>
                                    <td><input type="date" name="tgl_riwayat" class="form-control form-control-sm"
                                            required></td>
                                    <td>
                                        <div class="form-check d-inline-flex justify-content-center">
                                            <input type="checkbox" name="perawatan_berkala" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check d-inline-flex justify-content-center">
                                            <input type="checkbox" name="kalibrasi" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check d-inline-flex justify-content-center">
                                            <input type="checkbox" name="pelumasan" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check d-inline-flex justify-content-center">
                                            <input type="checkbox" name="ganti_sparepart" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check d-inline-flex justify-content-center">
                                            <input type="checkbox" name="overhaul" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>
                                        <textarea name="pic" id="" cols="10" rows="2" class="form-control form-control-sm"></textarea>
                                    </td>
                                    <td>
                                        <textarea name="ket_log" id="" cols="10" rows="2" class="form-control form-control-sm"></textarea>
                                    </td>
                                </tr>
                                <tr></tr>
                            </table>
                        </div>
                        <div class="modal-footer pb-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
