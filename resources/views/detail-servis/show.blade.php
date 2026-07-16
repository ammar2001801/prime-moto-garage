@extends('layouts.admin')

@section('title','Detail Servis')

@section('content')

<div class="container-fluid">


    <div class="d-flex justify-content-between mb-3">


        <h3>

            <i class="fas fa-tools"></i>

            Detail Servis

        </h3>



        <div>


            <a href="{{ route('detail-servis.create',['servis'=>$servis->id]) }}"
               class="btn btn-info">


                <i class="fas fa-plus"></i>

                Tambah Jasa


            </a>



            <a href="{{ route('detail-sparepart.create',['servis'=>$servis->id]) }}"
               class="btn btn-success">


                <i class="fas fa-cogs"></i>

                Tambah Sparepart


            </a>


        </div>


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

                    <b>Total</b>

                    <p>

                        Rp {{ number_format($servis->grand_total,0,',','.') }}

                    </p>

                </div>


            </div>


        </div>


    </div>






    <div class="card shadow">


        <div class="card-header bg-info text-white">

            Daftar Jasa Servis

        </div>


        <div class="card-body table-responsive">


            <table class="table table-bordered">


                <thead>

                    <tr>

                        <th>No</th>

                        <th>Pekerjaan</th>

                        <th>Biaya</th>

                        <th>Keterangan</th>

                    </tr>


                </thead>


                <tbody>


                @forelse($servis->detailServis as $item)


                    <tr>


                        <td>
                            {{ $loop->iteration }}
                        </td>


                        <td>
                            {{ $item->nama_pekerjaan }}
                        </td>


                        <td>

                            Rp {{ number_format($item->biaya_jasa,0,',','.') }}

                        </td>


                        <td>

                            {{ $item->keterangan ?? '-' }}

                        </td>


                    </tr>


                @empty


                    <tr>

                        <td colspan="4"
                            class="text-center">

                            Belum ada jasa.

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


        </div>


    </div>




    <br>


    <a href="{{ route('servis.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>


</div>


@endsection