@extends('layouts.template')

@section('title', 'Rekap Stok per Kategori')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Rekap Stok Kitab per Kategori</h3>
        <div class="card-tools">
            <a href="{{ url('/stok') }}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Total Stok</th>
                    <th>Stok Minimal</th>
                    <th>Kitab Menipis</th>
                    <th>Jumlah Kitab</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $key => $item)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td class="text-center">{{ $item->total_stok }}</td>
                    <td class="text-center">{{ $item->total_stok_minimal }}</td>
                    <td class="text-center">{{ $item->kitab_menipis }}</td>
                    <td class="text-center">{{ $item->kitab_count }}</td>
                    <td>
                        @if($item->total_stok == 0)
                            <span class="badge badge-danger">Kosong</span>
                        @elseif($item->kitab_menipis > 0)
                            <span class="badge badge-warning">Perlu Perhatian</span>
                        @else
                            <span class="badge badge-success">Aman</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data kategori</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection