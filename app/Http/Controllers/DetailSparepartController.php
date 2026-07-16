<?php

namespace App\Http\Controllers;

use App\Models\DetailSparepart;
use App\Models\Servis;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class DetailSparepartController extends Controller
{

    public function create(Request $request)
    {

        $servis = Servis::findOrFail($request->servis);

        $spareparts = Sparepart::all();


        return view(
            'detail-sparepart.create',
            compact(
                'servis',
                'spareparts'
            )
        );

    }



    public function store(Request $request)
    {

        $request->validate([

            'servis_id'=>'required',

            'sparepart_id'=>'required',

            'jumlah'=>'required|min:1'

        ]);



        $sparepart = Sparepart::findOrFail(
            $request->sparepart_id
        );



        $subtotal = 
        $sparepart->harga * $request->jumlah;




        DetailSparepart::create([

            'servis_id'=>$request->servis_id,

            'sparepart_id'=>$request->sparepart_id,

            'jumlah'=>$request->jumlah,

            'harga'=>$sparepart->harga,

            'subtotal'=>$subtotal

        ]);




        $sparepart->update([

            'stok'=>$sparepart->stok - $request->jumlah

        ]);




        $this->hitungTotal(
            $request->servis_id
        );




        return redirect()

        ->route(
            'detail-sparepart.show',
            $request->servis_id
        )

        ->with(
            'success',
            'Sparepart berhasil ditambahkan'
        );


    }





    public function show($id)
    {

        $servis = Servis::with(
            'detailSpareparts.sparepart'
        )

        ->findOrFail($id);



        return view(
            'detail-sparepart.show',
            compact('servis')
        );

    }





    public function edit($id)
    {

        $detailSparepart = DetailSparepart::findOrFail($id);


        return view(
            'detail-sparepart.edit',
            compact('detailSparepart')
        );

    }





    public function update(Request $request,$id)
    {

        $detail = DetailSparepart::findOrFail($id);



        $request->validate([

            'jumlah'=>'required|min:1'

        ]);



        $detail->update([

            'jumlah'=>$request->jumlah,

            'subtotal'=>
            $detail->harga * $request->jumlah

        ]);




        $this->hitungTotal(
            $detail->servis_id
        );




        return redirect()

        ->route(
            'detail-sparepart.show',
            $detail->servis_id
        )

        ->with(
            'success',
            'Data sparepart berhasil diperbarui'
        );


    }






    public function destroy($id)
    {

        $detail = DetailSparepart::findOrFail($id);



        $servis_id = $detail->servis_id;



        $sparepart = Sparepart::find(
            $detail->sparepart_id
        );



        if($sparepart)
        {

            $sparepart->update([

                'stok'=>
                $sparepart->stok + $detail->jumlah

            ]);

        }




        $detail->delete();




        $this->hitungTotal(
            $servis_id
        );




        return redirect()

        ->route(
            'detail-sparepart.show',
            $servis_id
        )

        ->with(
            'success',
            'Sparepart berhasil dihapus'
        );


    }





    private function hitungTotal($servis_id)
    {

        $servis = Servis::findOrFail(
            $servis_id
        );



        $totalSparepart = DetailSparepart::where(
            'servis_id',
            $servis_id
        )

        ->sum('subtotal');




        $servis->update([


            'total_sparepart'=>$totalSparepart,


            'grand_total'=>

            $servis->total_jasa + $totalSparepart


        ]);


    }


}