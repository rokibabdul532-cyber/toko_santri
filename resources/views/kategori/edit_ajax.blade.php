<form action="{{ url('/kategori/' . $kategori->kategori_id . '/update_ajax') }}" method="POST" id="form-edit">
    @csrf
    @method('PUT')
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Kategori</label>
                    <input type="text" name="kode_kategori" value="{{ $kategori->kode_kategori }}" class="form-control" required>
                    <small id="error-kode_kategori" class="error-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control" required>
                    <small id="error-nama_kategori" class="error-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Bidang Ilmu</label>
                    <input type="text" name="bidang_ilmu" value="{{ $kategori->bidang_ilmu }}" class="form-control">
                    <small id="error-bidang_ilmu" class="error-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ $kategori->deskripsi }}</textarea>
                    <small id="error-deskripsi" class="error-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $("#form-edit").validate({
        rules: {
            kode_kategori: { required: true, minlength: 3, maxlength: 20 },
            nama_kategori: { required: true, maxlength: 100 },
            bidang_ilmu: { maxlength: 100 },
            deskripsi: { maxlength: 255 }
        },
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response) {
                    if (response.status) {
                        $('#myModal').modal('hide');
                        Swal.fire({ icon: 'success', title: 'Berhasil', text: response.message });
                        $('#table-kategori').DataTable().ajax.reload();
                    } else {
                        $('.error-text').text('');
                        $.each(response.msgField, function(prefix, val) {
                            $('#error-' + prefix).text(val[0]);
                        });
                        Swal.fire({ icon: 'error', title: 'Terjadi Kesalahan', text: response.message });
                    }
                }
            });
            return false;
        }
    });
});
</script>