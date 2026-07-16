<?php

namespace App\Http\Controllers;

use App\Models\KategoriSparepart;
use Illuminate\Http\Request;

class KategoriSparepartController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $kategori = KategoriSparepart::when($search, function ($query) use ($search) {

            $query->where('nama_kategori', 'like', "%{$search}%")
                  ->orWhere('kode_sparepart', 'like', "%{$search}%");

        })
        ->latest()
        ->paginate(10);

        return view('kategori_sparepart.index', compact('kategori', 'search'));
    }

    public function create()
    {
        return view('kategori_sparepart.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'nama_kategori' => 'required|max:100',
            'kode_sparepart' => 'required|max:50|unique:kategori_spareparts,kode_sparepart',
            'satuan' => 'required|max:50',
            'keterangan' => 'nullable'

        ]);

        KategoriSparepart::create($request->all());

        return redirect()->route('kategori-sparepart.index')
            ->with('success', 'Kategori Sparepart berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = KategoriSparepart::findOrFail($id);

        return view('kategori_sparepart.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriSparepart::findOrFail($id);

        $request->validate([

            'nama_kategori' => 'required|max:100',
            'kode_sparepart' => 'required|max:50|unique:kategori_spareparts,kode_sparepart,' . $id,
            'satuan' => 'required|max:50',
            'keterangan' => 'nullable'

        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori-sparepart.index')
            ->with('success', 'Kategori Sparepart berhasil diubah.');
    }

    public function destroy($id)
    {
        $kategori = KategoriSparepart::findOrFail($id);

        $kategori->delete();

        return redirect()->route('kategori-sparepart.index')
            ->with('success', 'Kategori Sparepart berhasil dihapus.');
    }
}