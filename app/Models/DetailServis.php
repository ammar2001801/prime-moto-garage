<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailServis extends Model
{
    use HasFactory;

    protected $fillable = [
        'servis_id',
        'nama_pekerjaan',
        'biaya_jasa',
        'keterangan'
    ];


    public function servis()
    {
        return $this->belongsTo(Servis::class);
    }
}