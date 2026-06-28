<form action="{{ url('/supplier/' . $supplier->supplier_id . '/delete_ajax') }}" method="POST" id="form-delete">
    @csrf
    @method('DELETE')
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <h5><i class="icon fas fa-ban"></i> Konfirmasi !!!</h5>
                    Apakah Anda ingin menghapus data supplier berikut?
                </div>
                <table class="table table-sm table-bordered">
                    <tr><th>Kode Supplier</th><td>{{ $supplier->kode_supplier }}</td></tr>
                    <tr><th>Nama Supplier</th><td>{{ $supplier->nama_supplier }}</td></tr>
                    <tr><th>Alamat</th><td>{{ $supplier->alamat ?? '-' }}</td></tr>
                    <tr><th>No Telepon</th><td>{{ $supplier->no_telepon ?? '-' }}</td></tr>
                    <tr><th>Email</th><td>{{ $supplier->email ?? '-' }}</td></tr>
                    <tr><th>Kontak Person</th><td>{{ $supplier->kontak_person ?? '-' }}</td></tr>
                </table>
                <p class="text-danger mt-2">* Data yang dihapus tidak dapat dikembalikan!</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Ya, Hapus</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $("#form-delete").validate({
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response) {
                    if (response.status) {
                        $('#myModal').modal('hide');
                        Swal.fire({ icon: 'success', title: 'Berhasil', text: response.message });
                        $('#table-supplier').DataTable().ajax.reload();
                    } else {
                        Swal.fire({ icon: 'error', title: 'Terjadi Kesalahan', text: response.message });
                    }
                }
            });
            return false;
        }
    });
});
</script>