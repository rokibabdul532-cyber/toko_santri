<form action="{{ url('/penerbit/' . $penerbit->penerbit_id . '/delete_ajax') }}" method="POST" id="form-delete">
    @csrf
    @method('DELETE')
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Penerbit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <h5><i class="icon fas fa-ban"></i> Konfirmasi !!!</h5>
                    Apakah Anda ingin menghapus data penerbit berikut?
                </div>
                <table class="table table-sm table-bordered">
                    <tr><th>Kode Penerbit</th><td>{{ $penerbit->kode_penerbit }}</td></tr>
                    <tr><th>Nama Penerbit</th><td>{{ $penerbit->nama_penerbit }}</td></tr>
                    <tr><th>Alamat</th><td>{{ $penerbit->alamat ?? '-' }}</td></tr>
                    <tr><th>No Telepon</th><td>{{ $penerbit->no_telepon ?? '-' }}</td></tr>
                    <tr><th>Email</th><td>{{ $penerbit->email ?? '-' }}</td></tr>
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
                        $('#table-penerbit').DataTable().ajax.reload();
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