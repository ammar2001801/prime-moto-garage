<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pembayaran::with([
            'servis.kendaraan.pelanggan.user'
        ]);

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {

            $query->whereBetween(
                'tanggal_bayar',
                [
                    $request->tanggal_awal,
                    $request->tanggal_akhir
                ]
            );
        }

        $laporan = $query
            ->latest()
            ->get();

        return view('laporan.index', compact('laporan'));
    }

    public function cetak(Request $request)
    {
        $query = Pembayaran::with([
            'servis.kendaraan.pelanggan.user'
        ]);

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {

            $query->whereBetween(
                'tanggal_bayar',
                [
                    $request->tanggal_awal,
                    $request->tanggal_akhir
                ]
            );
        }

        $laporan = $query
            ->latest()
            ->get();

        return view('laporan.cetak', compact('laporan'));
    }
}