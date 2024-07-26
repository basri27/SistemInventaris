@extends('layouts.user_type.auth')
@section('title', 'Edit Data Catatan Riwayat Alat - Sistem Inventaris | PT. SCCI')
@section('page-path', 'Edit Data Catatan Riwayat Alat')
@section('page-title', 'Edit Data Catatan Riwayat Alat')
@section('content')
    <div>
        <div class="container">
            <a class="btn btn-sm btn-secondary" href="{{ route('catatan-riwayat-alat') }}">Back</a>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($catatan != null)
                    <div class="card mb-4 mx-4">
                        <div class="card-header pb-0">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="mb-0">Data Catatan Riwayat Alat</h5>
                                    <hr class="mt-0">
                                </div>

                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">

                            <div class="table-responsive">
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
                                                    <td>{{ $catatan != null ? ($catatan->no_formulir != null ? $catatan->no_formulir : '-') : '-' }}
                                                    </td>
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
                                                        {{ $catatan != null ? ($catatan->edisi != null ? $catatan->edisi : '-') : '-' }}
                                                        /
                                                        {{ $catatan != null ? ($catatan->revisi != null ? $catatan->revisi : '-') : '-' }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Nama Alat</th>
                                        <td colspan="7">{{ $catatan != null ? $catatan->invent->uraian : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Merk/Type</th>
                                        <td colspan="7">
                                            {{ $catatan != null ? ($catatan->invent->merk != null ? $catatan->invent->merk : '-') : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">No. Seri</th>
                                        <td colspan="7">
                                            {{ $catatan != null ? ($catatan->no_seri != null ? $catatan->no_seri : '-') : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">No. Inventaris</th>
                                        <td colspan="7">
                                            {{ $catatan != null ? ($catatan->no_invent != null ? $catatan->no_invent : '-') : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Lokasi Alat</th>
                                        <td colspan="7">
                                            {{ $catatan != null ? ($catatan->invent->lokasi != null ? $catatan->invent->lokasi : '-') : '-' }}
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
                                        <th>Overhaul</th>
                                    </tr>
                                    @if ($catatan != null)
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($riwayats as $item)
                                            <tr class="text-center cursor-pointer hover clickable-row{{ $item->id }}">
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
                                    @endif
                                    <tr></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @foreach ($riwayats as $item)
        <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="edit{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <form action="{{ route('update-catatan-alat', $item->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header m-2">
                            <h5 class="modal-title">Edit Data Catatan Riwayat Alat</h5>
                            <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <table
                                class="table table-bordered border border-dark text-xs text-dark w-auto align-middle m-2 bg-light">
                                <tr>
                                    <td rowspan="2" colspan="2" class="w-9"><img
                                            src="{{ asset('assets/img/logo-scci.png') }}" style="width: 100%; height:100%">
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
                                            value="{{ $item->tgl_riwayat }}" required></td>
                                    <td>
                                        <div class="form-check d-inline-flex justify-content-center">
                                            <input type="checkbox" name="perawatan_berkala" class="form-check-input"
                                                @if ($item->perawatan_berkala != null) checked @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check d-inline-flex justify-content-center">
                                            <input type="checkbox" name="kalibrasi" class="form-check-input"
                                                @if ($item->kalibrasi != null) checked @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check d-inline-flex justify-content-center">
                                            <input type="checkbox" name="pelumasan" class="form-check-input"
                                                @if ($item->pelumasan != null) checked @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check d-inline-flex justify-content-center">
                                            <input type="checkbox" name="ganti_sparepart" class="form-check-input"
                                                @if ($item->ganti_sparepart != null) checked @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check d-inline-flex justify-content-center">
                                            <input type="checkbox" name="overhaul" class="form-check-input"
                                                @if ($item->overhaul != null) checked @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <textarea name="pic" id="" cols="10" rows="2" class="form-control form-control-sm">{{ $item->pic }}</textarea>
                                    </td>
                                    <td>
                                        <textarea name="ket_log" id="" cols="10" rows="2" class="form-control form-control-sm">{{ $item->ket_log }}</textarea>
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
    @endforeach
@endsection

@section('custom-js')
    <script>
        const riwayats = <?php echo json_encode($riwayats); ?>;
        let riwayat = Object.values(riwayats);

        riwayat.forEach(element => {
            console.log(element);

            $(".clickable-row" + element['id']).click(function() {
                $("#edit" + element['id']).modal('show')
            });
        });
    </script>
@endsection
