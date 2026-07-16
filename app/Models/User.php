<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name',
    'email',
    'password',
    'role'
])]

#[Hidden([
    'password',
    'remember_token'
])]

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Relasi ke tabel pelanggan
     */
    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class);
    }

    /**
     * Relasi ke tabel mekanik
     */
    public function mekanik()
    {
        return $this->hasOne(Mekanik::class);
    }

    /**
     * Relasi ke pembayaran sebagai kasir
     */
    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'user_id_kasir');
    }

    /**
     * Cast Attribute
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}