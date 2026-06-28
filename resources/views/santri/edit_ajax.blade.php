<form action="{{ url('/santri/' . $santri->santri_id . '/update_ajax') }}" method="POST" id="form-edit">
    @csrf
    @method('PUT')
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Santri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Santri</label>
                            <input type="text" name="kode_santri" value="{{ $santri->kode_santri }}" class="form-control" required>
                            <small id="error-kode_santri" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Santri</label>
                            <input type="text" name="nama_santri" value="{{ $santri->nama_santri }}" class="form-control" required>
                            <small id="error-nama_santri" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Panggilan</label>
                            <input type="text" name="nama_panggilan" value="{{ $santri->nama_panggilan }}" class="form-control">
                            <small id="error-nama_panggilan" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="L" {{ $santri->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ $santri->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            <small id="error-jenis_kelamin" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ $santri->tempat_lahir }}" class="form-control">
                            <small id="error-tempat_lahir" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ $santri->tanggal_lahir }}" class="form-control">
                            <small id="error-tanggal_lahir" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2">{{ $santri->alamat }}</textarea>
                    <small id="error-alamat" class="error-text text-danger"></small>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" name="no_telepon" value="{{ $santri->no_telepon }}" class="form-control">
                            <small id="error-no_telepon" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $santri->email }}" class="form-control">
                            <small id="error-email" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Orang Tua</label>
                            <input type="text" name="nama_orang_tua" value="{{ $santri->nama_orang_tua }}" class="form-control">
                            <small id="error-nama_orang_tua" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No Telepon Orang Tua</label>
                            <input type="text" name="no_telepon_orang_tua" value="{{ $santri->no_telepon_orang_tua }}" class="form-control">
                            <small id="error-no_telepon_orang_tua" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" value="{{ $santri->kelas }}" class="form-control">
                            <small id="error-kelas" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Program</label>
                            <input type="text" name="program" value="{{ $santri->program }}" class="form-control">
                            <small id="error-program" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" value="{{ $santri->tanggal_masuk }}" class="form-control">
                            <small id="error-tanggal_masuk" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="aktif" {{ $santri->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ $santri->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            <small id="error-status" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="2">{{ $santri->keterangan }}</textarea>
                            <small id="error-keterangan" class="error-text text-danger"></small>
                        </div>
                    </div>
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
            kode_santri: { required: true, minlength: 3, maxlength: 20 },
            nama_santri: { required: true, maxlength: 100 }
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
                        $('#table-santri').DataTable().ajax.reload();
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