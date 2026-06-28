@empty($paket)
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">Data paket tidak ditemukan</div>
            </div>
        </div>
    </div>
@else
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Paket Kitab</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr><th style="width: 30%">Kode Paket</th><td>{{ $paket->kode_paket }}</td></tr>
                    <tr><th>Nama Paket</th><td>{{ $paket->nama_paket }}</td></tr>
                    <tr><th>Kelas</th><td>{{ $paket->kelas ?? '-' }}</td></tr>
                    <tr><th>Program</th><td>{{ $paket->program ?? '-' }}</td></tr>
                    <tr><th>Harga Paket</th><td>Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</td></tr>
                    <tr><th>Status</th><td>{{ $paket->status }}</td></tr>
                    <tr><th>Deskripsi</th><td>{{ $paket->deskripsi ?? '-' }}</td></tr>
                </table>

                <h5 class="mt-3">Daftar Kitab dalam Paket</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Judul Kitab</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paket->detail as $detail)
                        <tr>
                            <td>{{ $detail->kitab->kode_kitab ?? '-' }}</td>
                            <td>{{ $detail->kitab->judul_kitab ?? '-' }}</td>
                            <td class="text-center">{{ $detail->jumlah }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Tutup</button>
           