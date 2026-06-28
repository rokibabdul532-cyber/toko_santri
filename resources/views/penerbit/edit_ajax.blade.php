<form action="{{ url('/penerbit/' . $penerbit->penerbit_id . '/update_ajax') }}" method="POST" id="form-edit">
    @csrf
    @method('PUT')
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Penerbit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Penerbit</label>
                    <input type="text" name="kode_penerbit" value="{{ $penerbit->kode_penerbit }}" class="form-control" required>
                    <small id="error-kode_penerbit" class="error-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Nama Penerbit</label>
                    <input type="text" name="nama_penerbit" value="{{ $penerbit->nama_penerbit }}" class="form-control" required>
                    <small id="error-nama_penerbit" class="error-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2">{{ $penerbit->alamat }}</textarea>
                    <small id="error-alamat" class="error-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="no_telepon" value="{{ $penerbit->no_telepon }}" class="form-control">
                    <small id="error-no_telepon" class="error-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $penerbit->email }}" class="form-control">
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
            kode_penerbit: { required: true, minlength: 3, maxlength: 20 },
            nama_penerbit: { required: true, maxlength: 100 },
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
                        $('#table-penerbit').DataTable().ajax.reload();
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