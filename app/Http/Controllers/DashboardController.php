<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\Mekanik;
use App\Models\Sparepart;
use App\Models\Servis;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [

            'pelanggan' => Pelanggan::count(),

            'kendaraan' => Kendaraan::count(),

            'mekanik' => Mekanik::count(),

            'sparepart' => Sparepart::count(),

            'servis' => Servis::count(),

            'pembayaran' => Pembayaran::count(),

            'pendapatan' => Pembayaran::sum('total_tagihan'),

        ]);
    }
}