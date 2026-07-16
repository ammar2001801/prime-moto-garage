<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Servis;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $pembayarans = Pembayaran::with([
            'servis.kendaraan.pelanggan.user'
        ]);

        if ($request->search) {

            $pembayarans->whereHas('servis', function ($q) use ($request) {

                $q->where(
                    'kode_servis',
                    'like',
                    '%' . $request->search . '%'
                );

            });

        }

        $pembayarans = $pembayarans
            ->latest()
            ->paginate(10);

        return view(
            'pembayaran.index',
            compact('pembayarans')
        );
    }

    public function create()
    {
        $servis = Servis::whereDoesntHave('pembayaran')
            ->get();

        return view(
            'pembayaran.create',
            compact('servis')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'servis_id' => 'required',
            'tanggal_bayar' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'metode_bayar' => 'required'
        ]);

        $servis = Servis::findOrFail($request->servis_id);

        $total = $servis->grand_total;
        $bayar = $request->jumlah_bayar;

        if ($bayar >= $total) {

            $status = 'Lunas';
            $kembalian = $bayar - $total;

        } else {

            $status = 'Belum Lunas';
            $kembalian = 0;

        }

        Pembayaran::create([

            'servis_id' => $servis->id,

            'user_id_kasir' => auth()->id(),

            'tanggal_bayar' => $request->tanggal_bayar,

            'total_tagihan' => $total,

            'bayar' => $bayar,

            'kembalian' => $kembalian,

            'status' => $status,

            'metode_bayar' => $request->metode_bayar,

        ]);

        return redirect()
            ->route('pembayaran.index')
            ->with(
                'success',
                'Pembayaran berhasil ditambahkan.'
            );
    }

    public function show(Pembayaran $pembayaran)
    {
        $pembayaran->load([

            'servis.kendaraan.pelanggan.user',

            'servis.detailServis',

            'servis.detailSpareparts.sparepart'

        ]);

        return view(
            'pembayaran.show',
            compact('pembayaran')
        );
    }

    public function edit(Pembayaran $pembayaran)
    {
        $servis = Servis::all();

        return view(
            'pembayaran.edit',
            compact(
                'pembayaran',
                'servis'
            )
        );
    }

    public function update(
        Request $request,
        Pembayaran $pembayaran
    )
    {
        $request->validate([
            'servis_id' => 'required',
            'tanggal_bayar' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'metode_bayar' => 'required'
        ]);

        $servis = Servis::findOrFail($request->servis_id);

        $total = $servis->grand_total;
        $bayar = $request->jumlah_bayar;

        if ($bayar >= $total) {

            $status = 'Lunas';
            $kembalian = $bayar - $total;

        } else {

            $status = 'Belum Lunas';
            $kembalian = 0;

        }

        $pembayaran->update([

            'servis_id' => $servis->id,

            'user_id_kasir' => auth()->id(),

            'tanggal_bayar' => $request->tanggal_bayar,

            'total_tagihan' => $total,

            'bayar' => $bayar,

            'kembalian' => $kembalian,

            'status' => $status,

            'metode_bayar' => $request->metode_bayar,

        ]);

        return redirect()
            ->route('pembayaran.index')
            ->with(
                'success',
                'Pembayaran berhasil diupdate.'
            );
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()
            ->route('pembayaran.index')
            ->with(
                'success',
                'Pembayaran berhasil dihapus.'
            );
    }

    public function nota($id)
{
    $pembayaran = Pembayaran::with([
        'servis.kendaraan.pelanggan.user',
        'servis.detailServis',
        'servis.detailSpareparts.sparepart'
    ])->findOrFail($id);

    return view('pembayaran.nota', compact('pembayaran'));
}
}