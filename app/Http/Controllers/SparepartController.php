<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Models\KategoriSparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $spareparts = Sparepart::with('kategori')
            ->when($search, function ($query) use ($search) {

                $query->where('nama_sparepart', 'like', "%{$search}%")
                      ->orWhere('kode_sparepart', 'like', "%{$search}%");

            })
            ->latest()
            ->paginate(10);

        return view('sparepart.index', compact('spareparts', 'search'));
    }

    public function create()
    {
        $kategori = KategoriSparepart::all();

        return view('sparepart.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id'     => 'required',
            'nama_sparepart'  => 'required|max:100',
            'kode_sparepart'  => 'required|unique:spareparts',
            'satuan'          => 'required',
            'stok'            => 'required|numeric',
            'harga'           => 'required|numeric',
        ]);

        Sparepart::create($request->all());

        return redirect()->route('sparepart.index')
            ->with('success', 'Sparepart berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        $kategori = KategoriSparepart::all();

        return view('sparepart.edit', compact('sparepart', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $sparepart = Sparepart::findOrFail($id);

        $request->validate([
            'kategori_id'     => 'required',
            'nama_sparepart'  => 'required|max:100',
            'kode_sparepart'  => 'required|unique:spareparts,kode_sparepart,' . $id,
            'satuan'          => 'required',
            'stok'            => 'required|numeric',
            'harga'           => 'required|numeric',
        ]);

        $sparepart->update($request->all());

        return redirect()->route('sparepart.index')
            ->with('success', 'Sparepart berhasil diupdate.');
    }

    public function destroy($id)
    {
        $sparepart = Sparepart::findOrFail($id);

        $sparepart->delete();

        return redirect()->route('sparepart.index')
            ->with('success', 'Sparepart berhasil dihapus.');
    }
}