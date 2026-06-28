@extends('layouts.template')

@section('title', 'Data Pelanggan')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('/pelanggan/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Pelanggan</button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover" id="table-pelanggan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>

@endsection

@push('js')
<script>
function modalAction(url = '') {
    $('#myModal').empty();
    $('#myModal').load(url, function() {
        $('#myModal').modal('show');
    });
}

$(document).ready(function() {
    $('#myModal').on('hidden.bs.modal', function () {
        $('#myModal').empty();
    });

    $('#table-pelanggan').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('pelanggan/list') }}",
            type: "POST",
            data: function(d) {
                d._token = "{{ csrf_token() }}";
            }
        },
        columns: [
            { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
            { data: "kode_pelanggan", orderable: true, searchable: true },
            { data: "nama_pelanggan", orderable: true, searchable: true },
            { data: "alamat", orderable: true, searchable: true },
            { data: "no_telepon", orderable: true, searchable: true },
            { data: "email", orderable: true, searchable: true },
            { data: "aksi", orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush