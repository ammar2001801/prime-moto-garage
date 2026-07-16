<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSparepart extends Model
{
    use HasFactory;

    protected $table = 'detail_spareparts';

    protected $fillable = [
        'servis_id',
        'sparepart_id',
        'jumlah',
        'harga',
        'subtotal'
    ];

    public function servis()
    {
        return $this->belongsTo(Servis::class);
    }

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }
}