@extends('layouts.user_type.auth')
@section('title', 'Data Barang Masuk - Sistem Inventaris | PT. SCCI')
@section('page-path', 'Data Barang Masuk')
@section('page-title', 'Data Barang Masuk')
@section('content')
    @include('inventaris')
@endsection

@section('custom-js')
    <script>
        $('#myTable').DataTable();
    </script>
@endsection
