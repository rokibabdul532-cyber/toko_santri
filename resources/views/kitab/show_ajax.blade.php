@empty($kitab)
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">Data kitab tidak ditemukan</div>
            </div>
        </div>
    </div>
@else
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data Kitab</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr><th style="width: 30%">Kode Kitab</th><td>{{ $kitab->kode_kitab }}</td></tr>
                    <tr><th>Judul Kitab</th><td>{{ $kitab->judul_kitab }}</td></tr>
                    <tr><th>Kategori</th><td>{{ $kitab->kategori->nama_kategori ?? '-' }}</td></tr>
                    <tr><th>Pengarang</th><td>{{ $kitab->pengarang->nama_pengarang ?? '-' }}</td></tr>
                    <tr><th>Penerbit</th><td>{{ $kitab->penerbit->nama_penerbit ?? '-' }}</td></tr>
                    <tr><th>Supplier</th><td>{{ $kitab->supplier->nama_supplier ?? '-' }}</td></tr>
                    <tr><th>Tahun Terbit</th><td>{{ $kitab->tahun_terbit ?? '-' }}</td></tr>
                    <tr><th>Tebal Buku</th><td>{{ $kitab->tebal_buku ?? '-' }} halaman</td></tr>
                    <tr><th>Bahasa</th><td>{{ $kitab->bahasa ?? '-' }}</td></tr>
                    <tr><th>Stok</th><td>{{ $kitab->stok }}</td></tr>
                    <tr><th>Stok Minimal</th><td>{{ $kitab->stok_minimal }}</td></tr>
                    <tr><th>Harga Beli</th><td>Rp {{ number_format($kitab->harga_beli, 0, ',', '.') }}</td></tr>
                    <tr><th>Harga Jual</th><td>Rp {{ number_format($kitab->harga_jual, 0, ',', '.') }}</td></tr>
                    <tr><th>Diskon</th><td>{{ $kitab->diskon }}%</td></tr>
                    <tr><th>Status</th><td>{{ ucfirst($kitab->status) }}</td></tr>
                    <tr><th>Deskripsi</th><td>{{ $kitab->deskripsi ?? '-' }}</td></tr>
                    <tr><th>Created At</th><td>{{ $kitab->created_at }}</td></tr>
                    <tr><th>Updated At</th><td>{{ $kitab->updated_at }}</td></tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Tutup</button>
            </div>
        </div>
    </div>
@endempty