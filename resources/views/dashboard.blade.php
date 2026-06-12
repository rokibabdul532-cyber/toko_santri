@extends('layouts.template')

@section('title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalKaryawan }}</h3>
                <p>Total Karyawan</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ url('/karyawan') }}" class="small-box-footer">
                Kelola Karyawan <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>Toko Santri</h3>
                <p>Penjualan Kitab</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
            <a href="#" class="small-box-footer">
                Info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>Santri</h3>
                <p>Data Santri</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <a href="#" class="small-box-footer">
                Info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Selamat Datang di Aplikasi Toko Santri</h3>
    </div>
    <div class="card-body">
        <p>Aplikasi ini digunakan untuk mengelola data karyawan Toko Santri yang menjual berbagai kitab dan buku Islam.</p>
        <hr>
        <h5>Fitur yang tersedia:</h5>
        <ul>
            <li>✅ CRUD Data Karyawan (Create, Read, Update, Delete)</li>
            <li>✅ Validasi Client-side (jQuery Validation)</li>
            <li>✅ Validasi Server-side (Laravel Validation)</li>
            <li>✅ DataTables (pencarian, sorting, pagination)</li>
            <li>✅ Modal Ajax (tambah, edit, hapus tanpa reload)</li>
            <li>✅ Export data ke Excel</li>
            <li>✅ Template AdminLTE</li>
        </ul>
    </div>
</div>

@endsection