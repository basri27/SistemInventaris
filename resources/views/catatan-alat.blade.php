@extends('layouts.user_type.auth')
@section('title', 'Catatan Riwayat Alat - Sistem Inventaris | PT. SCCI')
@section('page-path', 'Catatan Riwayat Alat')
@section('page-title', 'Catatan Riwayat Alat')
@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-light alert-dismissable fade show d-flex justify-content-between m-4"
                        role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close bg-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card mb-4 mx-4">

                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">All Data Catatan Riwayat Alat</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive container">
                            <table id="myTable" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kode
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama Alat
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jumlah Catatan
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Merk
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kondisi
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invents as $item)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->kode }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->uraian }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    @if ($item->catatan->count() > 0)
                                                        {{ $riwayatCount = \App\Models\RiwayatAlat::where('catatan_id', $item->catatan[0]->id)->count() }}
                                                    @else
                                                        {{ $item->catatan->count() }}
                                                    @endif
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->merk != null ? $item->merk : '-' }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->tgl_perolehan != '0000-00-00' ? \Carbon\Carbon::parse($item->tgl_perolehan)->format('d F Y') : '-' }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->kondisi != null ? $item->kondisi : '-' }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('catatan-alat-add', $item->id) }}" class="mx-1"
                                                    data-bs-original-title="Edit user">
                                                    <i class="fas fa-plus text-secondary"></i>
                                                </a>
                                                @if ($item->catatan->count() > 0)
                                                    <a href="{{ route('catatan-alat-edit', $item->id) }}" class="mx-1"
                                                        data-bs-original-title="Edit user">
                                                        <i class="fas fa-edit text-secondary"></i>
                                                    </a>
                                                    <a href="#delete{{ $item->id }}" data-bs-toggle="modal"
                                                        class="mx-1" data-bs-original-title="Edit user">
                                                        <i class="fas fa-trash text-secondary"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($invents as $item)
        <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="delete{{ $item->id }}">
            <div id="delete{{ $item->id }}" class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Do you want to delete this data?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('delete-catatan-alat', $item->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="modal-body pb-0">
                            <table class="table table-borderless text-sm">
                                <tr>
                                    <th class="w-4">Kode</th>
                                    <th class="w-1">:</th>
                                    <th>{{ $item->kode }}</th>
                                </tr>
                                <tr>
                                    <th class="w-4">Nama Alat/Barang</th>
                                    <th class="w-1">:</th>
                                    <th>{{ $item->uraian }}</th>
                                </tr>
                                <tr>
                                    <th class="w-4">Jumlah Catatan Riwayat Alat</th>
                                    <th class="w-1">:</th>
                                    <th>
                                        @if ($item->catatan->count() > 0)
                                            {{ $riwayatCount = \App\Models\RiwayatAlat::where('catatan_id', $item->catatan[0]->id)->count() }}
                                        @else
                                            {{ $item->catatan->count() }}
                                        @endif
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer pb-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('custom-js')
    <script>
        $('#myTable').DataTable();
    </script>

@endsection
