<form action="{{ url('/kitab/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kitab</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Kitab</label>
                            <input type="text" name="kode_kitab" class="form-control" required>
                            <small id="error-kode_kitab" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul Kitab</label>
                            <input type="text" name="judul_kitab" class="form-control" required>
                            <small id="error-judul_kitab" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori_id" class="form-control" required>
                                <option value="">- Pilih Kategori -</option>
                                @foreach($kategori as $k)
                                    <option value="{{ $k->kategori_id }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <small id="error-kategori_id" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pengarang</label>
                            <select name="pengarang_id" class="form-control" required>
                                <option value="">- Pilih Pengarang -</option>
                                @foreach($pengarang as $p)
                                    <option value="{{ $p->pengarang_id }}">{{ $p->nama_pengarang }}</option>
                                @endforeach
                            </select>
                            <small id="error-pengarang_id" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Penerbit</label>
                            <select name="penerbit_id" class="form-control" required>
                                <option value="">- Pilih Penerbit -</option>
                                @foreach($penerbit as $p)
                                    <option value="{{ $p->penerbit_id }}">{{ $p->nama_penerbit }}</option>
                                @endforeach
                            </select>
                            <small id="error-penerbit_id" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Supplier</label>
                            <select name="supplier_id" class="form-control">
                                <option value="">- Pilih Supplier (Opsional) -</option>
                                @foreach($supplier as $s)
                                    <option value="{{ $s->supplier_id }}">{{ $s->nama_supplier }}</option>
                                @endforeach
                            </select>
                            <small id="error-supplier_id" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" class="form-control" min="1900" max="{{ date('Y') }}">
                            <small id="error-tahun_terbit" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tebal Buku (Halaman)</label>
                            <input type="number" name="tebal_buku" class="form-control" min="10">
                            <small id="error-tebal_buku" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Bahasa</label>
                            <input type="text" name="bahasa" class="form-control" value="Arab">
                            <small id="error-bahasa" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" value="0" min="0" required>
                            <small id="error-stok" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Stok Minimal</label>
                            <input type="number" name="stok_minimal" class="form-control" value="5" min="0" required>
                            <small id="error-stok_minimal" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                            <small id="error-status" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Harga Beli</label>
                            <input type="number" name="harga_beli" class="form-control" value="0" min="0" required>
                            <small id="error-harga_beli" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="number" name="harga_jual" class="form-control" value="0" min="0" required>
                            <small id="error-harga_jual" class="error-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Diskon (%)</label>
                            <input type="number" name="diskon" class="form-control" value="0" min="0" max="100">
                            <small id="error-diskon" class="error-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="2"></textarea>
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
    $("#form-tambah").validate({
        rules: {
            kode_kitab: { required: true, minlength: 3, maxlength: 20 },
            judul_kitab: { required: true, maxlength: 200 },
            kategori_id: { required: true, number: true },
            pengarang_id: { required: true, number: true },
            penerbit_id: { required: true, number: true },
            stok: { required: true, number: true, min: 0 },
            stok_minimal: { required: true, number: true, min: 0 },
            harga_beli: { required: true, number: true, min: 0 },
            harga_jual: { required: true, number: true, min: 0 },
            diskon: { number: true, min: 0, max: 100 }
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
                        $('#table-kitab').DataTable().ajax.reload();
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