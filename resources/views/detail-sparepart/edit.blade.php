@extends('layouts.admin')

@section('title','Edit Sparepart Servis')

@section('content')

<div class="container-fluid">


    <div class="row justify-content-center">


        <div class="col-lg-8">


            <div class="card shadow">


                <div class="card-header bg-warning">


                    <h4 class="mb-0">

                        <i class="fas fa-edit"></i>

                        Edit Sparepart Servis

                    </h4>


                </div>



                <div class="card-body">



                    <form action="{{ route('detail-sparepart.update',$detailSparepart->id) }}"
                          method="POST">


                        @csrf

                        @method('PUT')




                        <div class="mb-3">


                            <label>Sparepart</label>


                            <input type="text"
                                   class="form-control"
                                   value="{{ $detailSparepart->sparepart->nama_sparepart }}"
                                   readonly>


                        </div>





                        <div class="mb-3">


                            <label>Harga</label>


                            <input type="text"
                                   class="form-control"
                                   value="Rp {{ number_format($detailSparepart->harga,0,',','.') }}"
                                   readonly>


                        </div>





                        <div class="mb-3">


                            <label>Jumlah</label>


                            <input type="number"
                                   name="jumlah"
                                   class="form-control"
                                   value="{{ $detailSparepart->jumlah }}"
                                   min="1"
                                   required>


                        </div>






                        <div class="mb-3">


                            <label>Subtotal</label>


                            <input type="text"
                                   class="form-control"
                                   value="Rp {{ number_format($detailSparepart->subtotal,0,',','.') }}"
                                   readonly>


                        </div>






                        <div class="text-end">


                            <a href="{{ route('detail-sparepart.show',$detailSparepart->servis_id) }}"
                               class="btn btn-secondary">


                                Kembali


                            </a>




                            <button class="btn btn-warning">


                                Update


                            </button>



                        </div>




                    </form>



                </div>


            </div>


        </div>


    </div>


</div>


@endsection