<?php

namespace App\Http\Controllers;

use App\Models\Mekanik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MekanikController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $mekaniks = Mekanik::with('user')
            ->when($search,function($q) use ($search){

                $q->whereHas('user',function($qq) use ($search){

                    $qq->where('name','like',"%$search%")
                       ->orWhere('email','like',"%$search%");

                });

            })
            ->latest()
            ->paginate(10);

        return view('mekanik.index',compact('mekaniks','search'));
    }

    public function create()
    {
        return view('mekanik.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',
            'spesialisasi'=>'required',
            'no_hp'=>'required'

        ]);

        $user=User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'mekanik'

        ]);

        Mekanik::create([

            'user_id'=>$user->id,
            'spesialisasi'=>$request->spesialisasi,
            'no_hp'=>$request->no_hp

        ]);

        return redirect()->route('mekanik.index')
        ->with('success','Data mekanik berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mekanik=Mekanik::with('user')->findOrFail($id);

        return view('mekanik.edit',compact('mekanik'));
    }

    public function update(Request $request,$id)
    {
        $mekanik=Mekanik::findOrFail($id);

        $request->validate([

            'name'=>'required',
            'email'=>'required|email',
            'spesialisasi'=>'required',
            'no_hp'=>'required'

        ]);

        $mekanik->user->update([

            'name'=>$request->name,
            'email'=>$request->email

        ]);

        $mekanik->update([

            'spesialisasi'=>$request->spesialisasi,
            'no_hp'=>$request->no_hp

        ]);

        return redirect()->route('mekanik.index')
        ->with('success','Data berhasil diubah');
    }

    public function destroy($id)
    {
        $mekanik=Mekanik::findOrFail($id);

        $mekanik->user()->delete();

        return redirect()->route('mekanik.index')
        ->with('success','Data berhasil dihapus');
    }
}