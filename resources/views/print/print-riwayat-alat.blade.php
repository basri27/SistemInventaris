<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catatan Riwayat Alat</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo-scci.png') }}">
    <!-- Font Awesome Icons -->
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/font-awesome.js') }}"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
    {{-- DataTables --}}
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.0/css/dataTables.dataTables.min.css">
</head>

<body onload="printWindow()">
    <div class="mt-4">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <table
                        class="table table-bordered border border-dark text-sm text-dark w-auto align-middle mt-0 m-4">
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
                            <th>Overhaull</th>
                        </tr>
                        @if ($catatan != null)
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($riwayats as $item)
                                <tr class="text-center">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tgl_riwayat)->format('d-m-Y') }}</td>
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
    </div>
    <script>
        function printWindow() {
            setTimeout(() => {
                window.print();
            }, 2000);
        }
    </script>
</body>

</html>
