<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Barang @yield('title') | PT. Surveyor Carbon Consulting Indonesia</title>
    <link rel="icon" href="{{ asset('assets/img/logo-scci.png') }}">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- DataTables --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-2.1.2/b-3.1.0/b-html5-3.1.0/b-print-3.1.0/datatables.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.0/css/buttons.bootstrap5.min.css">

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.0/css/buttons.dataTables.css"> --}}
    <style>
        .text-xs {
            font-size: .6em
        }

        .text-sm {
            font-size: .8em
        }
    </style>
</head>

<body>
    <div class="card border-light p-1 m-4">
        <div class="d-flex justify-content-between">
            <h4>Ekspor Data Barang @yield('title')<br><sub>PT. Surveyor Carbon Consulting Indonesia</sub></h4>
            <img src="{{ asset('assets/img/logo-scci.png') }}" style="width: 10%; height: 5%">
        </div>
    </div>
    <div class="card shadow p-1 m-4">
        <div class="table-responsive pb-2">
            <table id="myTable" class="table table-bordered">
                <thead class="text-xs w-auto">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Uraian</th>
                        <th>Stok</th>
                        <th>Merk</th>
                        <th>Model/Type</th>
                        <th>Supplier</th>
                        <th>No. Purchase Order (PO)</th>
                        <th>Tgl. Perolehan</th>
                        <th>Harga</th>
                        <th>Lokasi</th>
                        <th>Perolehan</th>
                        <th>Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($invents as $item)
                        <tr class="text-xs text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->kode != null ? $item->kode : '-' }}</td>
                            <td>{{ $item->uraian != null ? $item->uraian : '-' }}</td>
                            <td>{{ $item->jumlah != null ? $item->jumlah : '-' }}</td>
                            <td>{{ $item->merk != null ? $item->merk : '-' }}</td>
                            <td>{{ $item->model != null ? $item->model : '-' }}</td>
                            <td>{{ $item->supplier != null ? $item->supplier : '-' }}</td>
                            <td>{{ $item->no_po != null ? $item->no_po : '-' }}</td>
                            <td>{{ $item->tgl_perolehan != '0000-00-00' ? \Carbon\Carbon::parse($item->tgl_perolehan)->format('d M Y') : '-' }}
                            </td>
                            <td>{{ $item->harga != null ? 'Rp. ' . number_format($item->harga) : '-' }}</td>
                            <td>{{ $item->lokasi != null ? $item->lokasi : '-' }}</td>
                            <td>{{ $item->perolehan != null ? $item->perolehan : '-' }}</td>
                            <td>{{ $item->kondisi != null ? $item->kondisi : '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.1.2/b-3.1.0/b-html5-3.1.0/b-print-3.1.0/datatables.min.js"></script>
    <script>
        new DataTable('#myTable', {
            searching: false,
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'print'],
                },
                topEnd: {
                    pageLength: {
                        menu: [5, 10, 25, 50, {
                            label: 'Semua',
                            value: -1
                        }]
                    }
                }
            }
        });
    </script>
</body>

</html>
