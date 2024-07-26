<div>
    <div class="row">
        <div class="col-12">

            <div class="card mb-4 mx-4">
                @if ($message = Session::get('success'))
                    <div class="alert alert-light alert-dismissable fade show d-flex justify-content-between"
                        role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close bg-dark" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="mb-0">All Data</h5>
                        </div>
                        <div class="text-end col-md-9">
                            <a class="btn btn-sm btn-info mb-2"
                                @if (Route::is('barang-masuk')) href="{{ route('print-barang-masuk') }}" @elseif(Route::is('barang-keluar')) href="{{ route('print-barang-keluar') }}" @endif
                                target="_blank">
                                <i class="fas fa-print"></i>&nbsp;Ekspor Data
                            </a>
                            <a href="{{ route('add-data-inventaris') }}" class="btn bg-gradient-warning btn-sm mb-2"
                                type="button"><i class="fas fa-plus"></i>&nbsp; New Data</a>
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
                                        Uraian
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jumlah
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
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->jumlah }}</p>
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
                                            <a href="{{ route('edit-data-inventaris', $item->id) }}" class="mx-3"
                                                data-bs-original-title="Edit user">
                                                <i class="fas fa-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <a href="#delete{{ $item->id }}" data-bs-toggle="modal">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </a>
                                            </span>
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
        <div id="delete{{ $item->id }}"
            class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Do you want to delete this data?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Kode</th>
                            <th>:</th>
                            <td>{{ $item->kode }}</td>
                        </tr>
                        <tr>
                            <th>Kelompok</th>
                            <th>:</th>
                            <td>{{ $item->category->kelompok }} | {{ $item->category->cat_name }}</td>
                        </tr>
                        <tr>
                            <th>Uraian</th>
                            <th>:</th>
                            <td>{{ $item->uraian }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <th>:</th>
                            <td>{{ $item->jumlah }}</td>
                        </tr>
                        <tr>
                            <th>Merk</th>
                            <th>:</th>
                            <td>{{ $item->merk != null ? $item->merk : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Model/Type</th>
                            <th>:</th>
                            <td>{{ $item->model != null ? $item->model : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Supplier</th>
                            <th>:</th>
                            <td>{{ $item->supplier != null ? $item->supplier : '-' }}</td>
                        </tr>
                        <tr>
                            <th>No. Purchase Order</th>
                            <th>:</th>
                            <td>{{ $item->no_po != null ? $item->no_po : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tgl. Perolehan</th>
                            <th>:</th>
                            <td>{{ $item->tgl_perolehan != '0000-00-00' ? \Carbon\Carbon::parse($item->tgl_perolehan)->format('d F Y') : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <th>:</th>
                            <td>{{ $item->harga != null ? 'Rp. ' . number_format($item->harga) : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <th>:</th>
                            <td>{{ $item->lokasi != null ? $item->lokasi : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Perolehan</th>
                            <th>:</th>
                            <td>{{ $item->perolehan != null ? $item->perolehan : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kondisi</th>
                            <th>:</th>
                            <td>{{ $item->kondisi != null ? $item->kondisi : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Ket. Barang</th>
                            <th>:</th>
                            <td>{{ $item->ket_invent != null ? $item->ket_invent : '-' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer pb-0">
                    <button type="button" class="btn  btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn  btn-danger">Confirm</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
