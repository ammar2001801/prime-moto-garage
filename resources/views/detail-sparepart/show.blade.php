@extends('layouts.admin')

@section('title','Detail Sparepart')

@section('content')

<div class="container-fluid">


    <div class="d-flex justify-content-between mb-3">


        <h3>

            <i class="fas fa-cogs"></i>

            Detail Sparepart

        </h3>



        <a href="{{ route('detail-sparepart.create',['servis'=>$servis->id]) }}"
           class="btn btn-success">


            <i class="fas fa-plus"></i>

            Tambah Sparepart


        </a>


    </div>





    <div class="card shadow mb-3">


        <div class="card-header bg-primary text-white">

            Informasi Servis

        </div>



        <div class="card-body">


            <div class="row">


                <div class="col-md-4">


                    <b>Kode Servis</b>

                    <p>

                        {{ $servis->kode_servis }}

                    </p>


                </div>



                <div class="col-md-4">


                    <b>Tanggal</b>

                    <p>

                        {{ $servis->tanggal_servis }}

                    </p>


                </div>



                <div class="col-md-4">


                    <b>Total Sparepart</b>

                    <p>

                        Rp {{ number_format($servis->total_sparepart ?? 0,0,',','.') }}

                    </p>


                </div>


            </div>


        </div>


    </div>






    <div class="card shadow">


        <div class="card-header bg-success text-white">

            Daftar Sparepart Digunakan

        </div>



        <div class="card-body table-responsive">


            <table class="table table-bordered table-hover">


                <thead>


                    <tr>

                        <th>No</th>

                        <th>Sparepart</th>

                        <th>Jumlah</th>

                        <th>Harga</th>

                        <th>Subtotal</th>

                        <th width="150">Aksi</th>


                    </tr>


                </thead>



                <tbody>



                @forelse($servis->detailSpareparts as $item)



                    <tr>


                        <td>

                            {{ $loop->iteration }}

                        </td>



                        <td>

                            {{ $item->sparepart->nama_sparepart }}

                        </td>



                        <td>

                            {{ $item->jumlah }}

                        </td>



                        <td>

                            Rp {{ number_format($item->harga,0,',','.') }}

                        </td>



                        <td>

                            Rp {{ number_format($item->subtotal,0,',','.') }}

                        </td>



                        <td>



                            <a href="{{ route('detail-sparepart.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">


                                <i class="fas fa-edit"></i>


                            </a>




                            <form action="{{ route('detail-sparepart.destroy',$item->id) }}"
                                  method="POST"
                                  class="d-inline form-delete">


                                @csrf

                                @method('DELETE')



                                <button class="btn btn-danger btn-sm">


                                    <i class="fas fa-trash"></i>


                                </button>


                            </form>


                        </td>


                    </tr>



                @empty


                    <tr>


                        <td colspan="6"
                            class="text-center">

                            Belum ada sparepart.


                        </td>


                    </tr>


                @endforelse



                </tbody>


            </table>


        </div>


    </div>





    <br>


    <a href="{{ route('detail-servis.show',$servis->id) }}"
       class="btn btn-secondary">


        Kembali


    </a>


</div>


@endsection