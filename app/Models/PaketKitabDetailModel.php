<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketKitabDetailModel extends Model
{
    use HasFactory;

    protected $table = 'paket_kitab_detail';
    protected $primaryKey = 'detail_id';
    protected $fillable = ['paket_id', 'kitab_id', 'jumlah'];

    public function paket()
    {
        return $this->belongsTo(PaketKitabModel::class, 'paket_id', 'paket_id');
    }

    public function kitab()
    {
        return $this->belongsTo(KitabModel::class, 'kitab_id', 'kitab_id');
    }
}