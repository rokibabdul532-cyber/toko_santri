@empty($kategori)
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data kategori tidak ditemukan
                </div>
                <a href="{{ url('/kategori') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th class="text-right col-3">ID Kategori</th>
                        <td class="col-9">{{ $kategori->kategori_id }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Kode Kategori</th>
                        <td class="col-9">{{ $kategori->kode_kategori }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Nama Kategori</th>
                        <td class="col-9">{{ $kategori->nama_kategori }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Bidang Ilmu</th>
                        <td class="col-9">{{ $kategori->bidang_ilmu ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Deskripsi</th>
                        <td class="col-9">{{ $kategori->deskripsi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Created At</th>
                        <td class="col-9">{{ $kategori->created_at ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Updated At</th>
                        <td class="col-9">{{ $kategori->updated_at ?? '-' }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Tutup</button>
            </div>
        </div>
    </div>
@endempty