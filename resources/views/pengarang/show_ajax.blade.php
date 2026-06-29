@empty($pengarang)
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
                    Data pengarang tidak ditemukan
                </div>
                <a href="{{ url('/pengarang') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data Pengarang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr><th style="width: 30%">Kode Pengarang</th><td>{{ $pengarang->kode_pengarang }}</td></tr>
                    <tr><th>Nama Pengarang</th><td>{{ $pengarang->nama_pengarang }}</td></tr>
                    <tr><th>Biografi</th><td>{{ $pengarang->biografi ?? '-' }}</td></tr>
                    <tr><th>Negara Asal</th><td>{{ $pengarang->negara_asal ?? '-' }}</td></tr>
                    <tr><th>Created At</th><td>{{ $pengarang->created_at ?? '-' }}</td></tr>
                    <tr><th>Updated At</th><td>{{ $pengarang->updated_at ?? '-' }}</td></tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Tutup</button>
            </div>
        </div>
    </div>
@endempty
