<form action="{{ url('/paket-kitab/' . $paket->paket_id . '/update_ajax') }}" method="POST" id="form-edit">
    @csrf
    @method('PUT')
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Paket Kitab</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Paket</label>
                            <input type="text" name="kode_paket" value="{{ $paket->kode_paket }}" class="form-control" required>
                            <small id="error-kode_paket" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <input type="text" name="nama_paket" value="{{ $paket->nama_paket }}" class="form-control" required>
                            <small id="error-nama_paket" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" value="{{ $paket->kelas }}" class="form-control">
                            <small id="error-kelas" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Program</label>
                            <input type="text" name="program" value="{{ $paket->program }}" class="form-control">
                            <small id="error-program" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Paket</label>
                            <input type="number" name="harga_paket" value="{{ $paket->harga_paket }}" class="form-control" min="0" required>
                            <small id="error-harga_paket" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="aktif" {{ $paket->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ $paket->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            <small id="error-status" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="2">{{ $paket->deskripsi }}</textarea>
                    <small id="error-deskripsi" class="error-text text-danger"></small>
                </div>

                <hr>
                <h5>Detail Kitab</h5>
                <div id="detail-kitab">
                    @foreach($paket->detail as $index => $detail)
                    <div class="row mb-2" id="kitab-{{ $index + 1 }}">
                        <div class="col-md-5">
                            <select name="kitab_id[]" class="form-control" required>
                                <option value="">- Pilih Kitab -</option>
                                @foreach($kitab as $k)
                                    <option value="{{ $k->kitab_id }}" {{ $k->kitab_id == $detail->kitab_id ? 'selected' : '' }}>{{ $k->kode_kitab }} - {{ $k->judul_kitab }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="jumlah[]" class="form-control" value="{{ $detail->jumlah }}" min="1" required>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="Rp {{ number_format($detail->kitab->harga_jual ?? 0, 0, ',', '.') }}" disabled>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger btn-sm btn-remove">Hapus</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-2">
                    <button type="button" id="tambah-kitab" class="btn btn-sm btn-primary">Tambah Kitab</button>
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
let kitabCount = {{ $paket->detail->count() }};

$(document).ready(function() {
    $('#tambah-kitab').click(function() {
        kitabCount++;
        let newRow = `
            <div class="row mb-2" id="kitab-${kitabCount}">
                <div class="col-md-5">
                    <select name="kitab_id[]" class="form-control" required>
                        <option value="">- Pilih Kitab -</option>
                        @foreach($kitab as $k)
                            <option value="{{ $k->kitab_id }}">{{ $k->kode_kitab }} - {{ $k->judul_kitab }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" min="1" value="1" required>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" value="Rp {{ number_format(0, 0, ',', '.') }}" disabled>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger btn-sm btn-remove">Hapus</button>
                </div>
            </div>
        `;
        $('#detail-kitab').append(newRow);
    });

    $(document).on('click', '.btn-remove', function() {
        $(this).closest('.row').remove();
    });

    $("#form-edit").validate({
        rules: {
            kode_paket: { required: true, minlength: 3, maxlength: 20 },
            nama_paket: { required: true, maxlength: 100 },
            harga_paket: { required: true, number: true, min: 0 },
            'kitab_id[]': { required: true },
            'jumlah[]': { required: true, number: true, min: 1 }
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
                        $('#table-paket').DataTable().ajax.reload();
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