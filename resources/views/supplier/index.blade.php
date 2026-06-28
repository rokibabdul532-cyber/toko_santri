@extends('layouts.template')

@section('title', 'Data Supplier')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('/supplier/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Supplier</button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover" id="table-supplier">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Kontak Person</th>
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

    $('#table-supplier').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('supplier/list') }}",
            type: "POST",
            data: function(d) {
                d._token = "{{ csrf_token() }}";
            }
        },
        columns: [
            { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
            { data: "kode_supplier", orderable: true, searchable: true },
            { data: "nama_supplier", orderable: true, searchable: true },
            { data: "alamat", orderable: true, searchable: true },
            { data: "no_telepon", orderable: true, searchable: true },
            { data: "email", orderable: true, searchable: true },
            { data: "kontak_person", orderable: true, searchable: true },
            { data: "aksi", orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush