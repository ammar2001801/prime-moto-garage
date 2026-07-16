@extends('layouts.admin')

@section('title','Data Servis')

@section('content')

<div class="container-fluid">


    <div class="d-flex justify-content-between mb-3">

        <h3>
            <i class="fas fa-tools"></i>
            Data Servis
        </h3>


        <a href="{{ route('servis.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Servis

        </a>


    </div>




    {{-- Search --}}

    <div class="card shadow">


        <div class="card-body">


            <form method="GET">


                <div class="row">


                    <div class="col-md-10">


                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari kode servis atau plat nomor..."
                               value="{{ request('search') }}">



                    </div>



                    <div class="col-md-2">


                        <button class="btn btn-primary w-100">

                            Cari

                        </button>


                    </div>



                </div>


            </form>


        </div>


    </div>



    <br>




    {{-- Data Servis --}}


    <div class="card shadow">


        <div class="card-header bg-primary text-white">

            Data Servis

        </div>




        <div class="card-body table-responsive">


            <table class="table table-bordered table-hover">


                <thead>


                    <tr>


                        <th>No</th>

                        <th>Kode</th>

                        <th>Tanggal</th>

                        <th>Pelanggan</th>

                        <th>Plat Nomor</th>

                        <th>Mekanik</th>

                        <th>Status</th>

                        <th>Total</th>

                        <th width="200">
                            Aksi
                        </th>


                    </tr>


                </thead>




                <tbody>


                @forelse($servis as $item)


                    <tr>


                        <td>

                            {{ $loop->iteration }}

                        </td>



                        <td>

                            {{ $item->kode_servis }}

                        </td>



                        <td>

                            {{ $item->tanggal_servis }}

                        </td>



                        <td>

                            {{ $item->kendaraan->pelanggan->user->name ?? '-' }}

                        </td>



                        <td>

                            {{ $item->kendaraan->plat_nomor ?? '-' }}

                        </td>



                        <td>

                            {{ $item->mekanik->user->name ?? '-' }}

                        </td>



                        <td>


                            @if($item->status == 'Selesai')


                                <span class="badge bg-success">

                                    {{ $item->status }}

                                </span>



                            @elseif($item->status == 'Dikerjakan')


                                <span class="badge bg-warning">

                                    {{ $item->status }}

                                </span>



                            @else


                                <span class="badge bg-secondary">

                                    {{ $item->status }}

                                </span>


                            @endif



                        </td>




                        <td>


                            Rp {{ number_format($item->grand_total ?? 0,0,',','.') }}


                        </td>




                        <td>



                            {{-- Detail Servis --}}


                            <a href="{{ route('detail-servis.show',$item->id) }}"
                               class="btn btn-info btn-sm"
                               title="Detail Servis">


                                <i class="fas fa-tools"></i>


                            </a>




                            {{-- Edit --}}


                            <a href="{{ route('servis.edit',$item->id) }}"
                               class="btn btn-warning btn-sm"
                               title="Edit">


                                <i class="fas fa-edit"></i>


                            </a>





                            {{-- Hapus --}}


                           <form action="{{ route('servis.destroy',$item->id) }}"
                                    method="POST"
                                    class="d-inline form-delete">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                     class="btn btn-danger btn-sm">

                                <i class="fas fa-trash"></i>

                            </button>

                            </form>




                        </td>



                    </tr>




                @empty


                    <tr>


                        <td colspan="9"
                            class="text-center">


                            Belum ada data servis.


                        </td>


                    </tr>



                @endforelse




                </tbody>



            </table>




            {{ $servis->links() }}



        </div>


    </div>



</div>


@endsection