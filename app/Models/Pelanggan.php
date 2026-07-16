<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'no_hp',
        'nik',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class);
    }
}