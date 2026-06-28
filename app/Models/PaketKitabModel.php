<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketKitabModel extends Model
{
    use HasFactory;

    protected $table = 'paket_kitab';
    protected $primaryKey = 'paket_id';
    protected $fillable = [
        'kode_paket', 'nama_paket', 'deskripsi', 'kelas', 'program', 'harga_paket', 'diskon', 'status'
    ];

    public function detail()
    {
        return $this->hasMany(PaketKitabDetailModel::class, 'paket_id', 'paket_id');
    }
}