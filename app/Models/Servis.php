<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    use HasFactory;

    protected $table = 'servis';

    protected $fillable = [
    'kendaraan_id',
    'mekanik_id',
    'tanggal_servis',
    'kode_servis',
    'keluhan',
    'diagnosa',
    'status',
    'total_jasa',
    'total_sparepart',
    'grand_total'
];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function mekanik()
    {
        return $this->belongsTo(Mekanik::class);
    }

    public function detailServis()
    {
        return $this->hasMany(DetailServis::class);
    }

    public function detailSpareparts()
    {
        return $this->hasMany(DetailSparepart::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}