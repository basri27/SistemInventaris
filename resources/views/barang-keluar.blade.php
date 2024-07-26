@extends('layouts.user_type.auth')
@section('title', 'Data Barang Keluar - Sistem Inventaris | PT. SCCI')
@section('page-path', 'Data Barang Keluar')
@section('page-title', 'Data Barang Keluar')
@section('content')
    @include('inventaris')
@endsection

@section('custom-js')
    <script>
        $('#myTable').DataTable();
    </script>
@endsection
