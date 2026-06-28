<form action="{{ url('/pelanggan/' . $pelanggan->pelanggan_id . '/update_ajax') }}" method="POST" id="form-edit">
    @csrf
    @method('PUT')
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Pelanggan</label>
                    <input type="text" name="kode_pelanggan" value="{{ $pelanggan->kode_pelanggan }}" class="form-control" required>
                    <small id="error-kode_pelanggan" class="error-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" value="{{ $pelanggan->nama_pelanggan }}" class="form-control" required>
                    <small id="error-nama_pelanggan" class="error-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2">{{ $pelanggan->alamat }}</textarea>
                    <small id="error-alamat" class="error-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="no_telepon" value="{{ $pelanggan->no_telepon }}" class="form-control">
                    <small id="error-no_telepon" class="error-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $pelanggan->email }}" class="form-control">
                    <small id="error-email" class="error-text text-danger"></small>
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
            kode_pelanggan: { required: true, minlength: 3, maxlength: 20 },
            nama_pelanggan: { required: true, maxlength: 100 },
            no_telepon: { maxlength: 15 },
            email: { email: true, maxlength: 100 }
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
                        $('#table-pelanggan').DataTable().ajax.reload();
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