@empty($santri)
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">Data santri tidak ditemukan</div>
            </div>
        </div>
    </div>
@else
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data Santri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr><th style="width: 35%">Kode Santri</th><td>{{ $santri->kode_santri }}</td></tr>
                    <tr><th>Nama Santri</th><td>{{ $santri->nama_santri }}</td></tr>
                    <tr><th>Nama Panggilan</th><td>{{ $santri->nama_panggilan ?? '-' }}</td></tr>
                    <tr><th>Jenis Kelamin</th><td>{{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : ($santri->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}</td></tr>
                    <tr><th>Tempat, Tanggal Lahir</th><td>{{ $santri->tempat_lahir ?? '-' }}, {{ $santri->tanggal_lahir ?? '-' }}</td></tr>
                    <tr><th>Alamat</th><td>{{ $santri->alamat ?? '-' }}</td></tr>
                    <tr><th>No Telepon</th><td>{{ $santri->no_telepon ?? '-' }}</td></tr>
                    <tr><th>Email</th><td>{{ $santri->email ?? '-' }}</td></tr>
                    <tr><th>Orang Tua</th><td>{{ $santri->nama_orang_tua ?? '-' }} ({{ $santri->no_telepon_orang_tua ?? '-' }})</td></tr>
                    <tr><th>Kelas</th><td>{{ $santri->kelas ?? '-' }}</td></tr>
                    <tr><th>Program</th><td>{{ $santri->program ?? '-' }}</td></tr>
                    <tr><th>Tanggal Masuk</th><td>{{ $santri->tanggal_masuk ?? '-' }}</td></tr>
                    <tr><th>Status</th><td>{{ $santri->status ?? '-' }}</td></tr>
                    <tr><th>Keterangan</th><td>{{ $santri->keterangan ?? '-' }}</td></tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Tutup</button>
            </div>
        </div>
    </div>
@endempty