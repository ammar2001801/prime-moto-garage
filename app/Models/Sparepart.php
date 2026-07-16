<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    protected $fillable = [

        'kategori_id',

        'nama_sparepart',

        'kode_sparepart',

        'satuan',

        'stok',

        'harga'

    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSparepart::class,'kategori_id');
    }

    public function detailSpareparts()
    {
        return $this->hasMany(DetailSparepart::class);
    }
}