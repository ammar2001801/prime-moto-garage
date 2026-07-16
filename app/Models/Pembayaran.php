<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';

    protected $fillable = [
        'servis_id',
        'user_id_kasir',
        'tanggal_bayar',
        'total_tagihan',
        'bayar',
        'kembalian',
        'status',
        'metode_bayar',
    ];

    public function servis()
    {
        return $this->belongsTo(Servis::class);
    }

    public function kasir()
    {
        return $this->belongsTo(User::class, 'user_id_kasir');
    }
}