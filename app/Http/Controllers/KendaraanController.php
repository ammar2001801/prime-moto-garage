<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $kendaraans = Kendaraan::with('pelanggan.user')
            ->when($search, function ($query) use ($search) {
                $query->where('plat_nomor', 'like', "%$search%")
                      ->orWhere('merk', 'like', "%$search%")
                      ->orWhere('tipe', 'like', "%$search%");
            })
            ->latest()
            ->paginate(10);

        return view('kendaraan.index', compact('kendaraans', 'search'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::with('user')->get();

        return view('kendaraan.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'plat_nomor' => 'required|unique:kendaraans',
            'merk' => 'required',
            'tipe' => 'required',
            'warna' => 'nullable',
            'nomor_rangka' => 'nullable',
            'nomor_mesin' => 'nullable',
            'tahun' => 'required|digits:4',
        ]);

        Kendaraan::create($request->all());

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $pelanggans = Pelanggan::with('user')->get();

        return view('kendaraan.edit', compact('kendaraan', 'pelanggans'));
    }

    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
            'pelanggan_id' => 'required',
            'plat_nomor' => 'required|unique:kendaraans,plat_nomor,' . $kendaraan->id,
            'merk' => 'required',
            'tipe' => 'required',
            'warna' => 'nullable',
            'nomor_rangka' => 'nullable',
            'nomor_mesin' => 'nullable',
            'tahun' => 'required|digits:4',
        ]);

        $kendaraan->update($request->all());

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diubah.');
    }

    public function destroy($id)
    {
        Kendaraan::findOrFail($id)->delete();

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil dihapus.');
    }
}