<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $pelanggans = Pelanggan::with('user')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('pelanggan.index', compact('pelanggans', 'search'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'no_hp'    => 'required|max:15',
            'nik'      => 'nullable|max:20',
            'alamat'   => 'required',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'pelanggan',
        ]);

        Pelanggan::create([
            'user_id' => $user->id,
            'no_hp'   => $request->no_hp,
            'nik'     => $request->nik,
            'alamat'  => $request->alamat,
        ]);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::with('user')->findOrFail($id);

        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'name'   => 'required|max:100',
            'email'  => 'required|email|unique:users,email,' . $pelanggan->user_id,
            'no_hp'  => 'required|max:15',
            'nik'    => 'nullable|max:20',
            'alamat' => 'required',
        ]);

        $pelanggan->user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        $pelanggan->update([
            'no_hp'  => $request->no_hp,
            'nik'    => $request->nik,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diubah.');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->user()->delete();

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus.');
    }
}