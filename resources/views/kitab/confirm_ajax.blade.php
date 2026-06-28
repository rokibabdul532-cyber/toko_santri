<form action="{{ url('/kitab/' . $kitab->kitab_id . '/delete_ajax') }}" method="POST" id="form-delete">
    @csrf
    @method('DELETE')
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Kitab</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <h5><i class="icon fas fa-ban"></i> Konfirmasi !!!</h5>
                    Apakah Anda ingin menghapus data kitab berikut?
                </div>
                <table class="table table-sm table-bordered">
                    <tr>
                        <th>Kode Kitab</th>
                        <td>{{ $kitab->kode_kitab }}</td>
                    </tr>
                    <tr>
                        <th>Judul Kitab</th>
                        <td>{{ $kitab->judul_kitab }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>{{ $kitab->kategori->nama_kategori ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Pengarang</th>
                        <td>{{ $kitab->pengarang->nama_pengarang ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>{{ $kitab->stok }}</td>
                    </tr>
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
                        $('#table-kitab').DataTable().ajax.reload();
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