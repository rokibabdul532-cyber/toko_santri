<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantriModel extends Model
{
    use HasFactory;

    protected $table = 'santri';
    protected $primaryKey = 'santri_id';
    protected $fillable = [
        'kode_santri', 'nama_santri', 'nama_panggilan', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'alamat', 'no_telepon', 'email', 'nama_orang_tua', 'no_telepon_orang_tua',
        'kelas', 'program', 'tanggal_masuk', 'status', 'keterangan'
    ];
}