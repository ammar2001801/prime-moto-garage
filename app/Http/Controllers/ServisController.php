<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use App\Models\Kendaraan;
use App\Models\Mekanik;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $servis = Servis::with(['kendaraan.pelanggan.user','mekanik.user'])
            ->when($search,function($query) use($search){

                $query->where('kode_servis','like',"%{$search}%")
                      ->orWhere('status','like',"%{$search}%")
                      ->orWhereHas('kendaraan',function($q) use($search){

                            $q->where('plat_nomor','like',"%{$search}%");

                      });

            })
            ->latest()
            ->paginate(10);

        return view('servis.index',compact('servis','search'));
    }

    public function create()
    {
        $kendaraans = Kendaraan::with('pelanggan.user')->get();
        $mekaniks = Mekanik::with('user')->get();

        return view('servis.create',compact('kendaraans','mekaniks'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'kendaraan_id'=>'required',
            'mekanik_id'=>'required',
            'tanggal_servis'=>'required|date',
            'keluhan'=>'required',
            'diagnosa'=>'nullable',
            'status'=>'required',

        ]);

        $kode = 'SRV'.str_pad((Servis::count()+1),4,'0',STR_PAD_LEFT);
        
        Servis::create([

            'kendaraan_id'=>$request->kendaraan_id,
            'mekanik_id'=>$request->mekanik_id,
            'tanggal_servis'=>$request->tanggal_servis,
            'kode_servis'=>$kode,
            'keluhan'=>$request->keluhan,
            'diagnosa'=>$request->diagnosa,
            'status'=>$request->status,
            'total_jasa'=>0,
            'total_sparepart'=>0,
            'grand_total'=>0,

        ]);

        return redirect()
            ->route('servis.index')
            ->with('success','Data servis berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $servis = Servis::findOrFail($id);

        $kendaraans = Kendaraan::with('pelanggan.user')->get();

        $mekaniks = Mekanik::with('user')->get();

        return view('servis.edit',compact(
            'servis',
            'kendaraans',
            'mekaniks'
        ));
    }

    public function update(Request $request,$id)
    {
        $servis = Servis::findOrFail($id);

        $request->validate([

            'kendaraan_id'=>'required',
            'mekanik_id'=>'required',
            'tanggal_servis'=>'required',
            'keluhan'=>'required',
            'diagnosa'=>'nullable',
            'status'=>'required',

        ]);

        $servis->update([

            'kendaraan_id'=>$request->kendaraan_id,
            'mekanik_id'=>$request->mekanik_id,
            'tanggal_servis'=>$request->tanggal_servis,
            'keluhan'=>$request->keluhan,
            'diagnosa'=>$request->diagnosa,
            'status'=>$request->status,

        ]);

        return redirect()
            ->route('servis.index')
            ->with('success','Data servis berhasil diubah.');
    }

    public function destroy($id)
    {
        $servis = Servis::findOrFail($id);

        $servis->delete();

        return redirect()
            ->route('servis.index')
            ->with('success','Data servis berhasil dihapus.');
    }
}