<?php

namespace App\Http\Controllers;

use App\Models\DetailServis;
use App\Models\Servis;
use Illuminate\Http\Request;

class DetailServisController extends Controller
{

    public function create(Request $request)
    {

        $servis = Servis::findOrFail($request->servis);

        return view('detail-servis.create', compact('servis'));

    }



    public function store(Request $request)
    {

        $request->validate([

            'servis_id'=>'required',
            'nama_pekerjaan'=>'required',
            'biaya_jasa'=>'required',

        ]);


        DetailServis::create([

            'servis_id'=>$request->servis_id,
            'nama_pekerjaan'=>$request->nama_pekerjaan,
            'biaya_jasa'=>$request->biaya_jasa,
            'keterangan'=>$request->keterangan,

        ]);


        $this->hitungTotal($request->servis_id);


        return redirect()
        ->route('detail-servis.show',$request->servis_id)
        ->with('success','Jasa berhasil ditambahkan');

    }



    public function show($id)
    {

        $servis = Servis::with('detailServis')
        ->findOrFail($id);


        return view(
            'detail-servis.show',
            compact('servis')
        );

    }




    public function edit($id)
    {

        $detailServis = DetailServis::findOrFail($id);


        return view(
            'detail-servis.edit',
            compact('detailServis')
        );

    }




    public function update(Request $request,$id)
    {


        $detailServis = DetailServis::findOrFail($id);


        $detailServis->update([

            'nama_pekerjaan'=>$request->nama_pekerjaan,

            'biaya_jasa'=>$request->biaya_jasa,

            'keterangan'=>$request->keterangan

        ]);



        $this->hitungTotal(
            $detailServis->servis_id
        );



        return redirect()
        ->route(
            'detail-servis.show',
            $detailServis->servis_id
        );

    }





    public function destroy($id)
    {


        $detailServis = DetailServis::findOrFail($id);


        $servis_id = $detailServis->servis_id;


        $detailServis->delete();



        $this->hitungTotal($servis_id);



        return redirect()
        ->route(
            'detail-servis.show',
            $servis_id
        );

    }




    private function hitungTotal($servis_id)
    {


        $totalJasa = DetailServis::where(
            'servis_id',
            $servis_id
        )
        ->sum('biaya_jasa');



        $servis = Servis::findOrFail($servis_id);



        $servis->update([


            'total_jasa'=>$totalJasa,


            'grand_total'=>
            $totalJasa + $servis->total_sparepart


        ]);



    }


}