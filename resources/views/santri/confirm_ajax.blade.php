<form action="{{ url('/santri/' . $santri->santri_id . '/delete_ajax') }}" method="POST" id="form-delete">
    @csrf
    @method('DELETE')
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Santri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <h5><i class="icon fas fa-ban"></i> Konfirmasi !!!</h5>
                    Apakah Anda ingin menghapus data santri berikut?
                </div>
                <table class="table table-sm table-bordered">
                    <tr><th>Kode Santri</th><td>{{ $santri->kode_santri }}</td></tr>
                    <tr><th>Nama Santri</th><td>{{ $santri->nama_santri }}</td></tr>
                    <tr><th>Kelas</th><td>{{ $santri->kelas ?? '-' }}</td></tr>
                    <tr><th>Program</th><td>{{ $santri->program ?? '-' }}</td></tr>
                    <tr><th>Status</th><td>{{ $santri->status ?? '-' }}</td></tr>
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
                        $('#table-santri').DataTable().ajax.reload();
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