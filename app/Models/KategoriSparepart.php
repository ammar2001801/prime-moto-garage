<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSparepart extends Model
{
    use HasFactory;

    protected $table = 'kategori_spareparts';

    protected $fillable = [

        'nama_kategori',

        'kode_sparepart',

        'satuan',

        'keterangan'

    ];

    public function spareparts()
    {
        return $this->hasMany(Sparepart::class, 'kategori_id');
    }
}