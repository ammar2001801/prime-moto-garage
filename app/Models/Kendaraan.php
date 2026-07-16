<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelanggan_id',
        'plat_nomor',
        'merk',
        'tipe',
        'warna',
        'nomor_rangka',
        'nomor_mesin',
        'tahun',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}