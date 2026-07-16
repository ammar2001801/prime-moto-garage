@extends('layouts.admin')

@section('title','Tambah Sparepart Servis')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-info text-white">

                    <h4 class="mb-0">

                        <i class="fas fa-cogs"></i>

                        Tambah Sparepart Servis

                    </h4>

                </div>


                <div class="card-body">


                    <form action="{{ route('detail-sparepart.store') }}"
                          method="POST">

                        @csrf


                        <input type="hidden"
                               name="servis_id"
                               value="{{ $servis->id }}">



                        <div class="mb-3">

                            <label>Kode Servis</label>

                            <input type="text"
                                   class="form-control"
                                   value="{{ $servis->kode_servis }}"
                                   readonly>

                        </div>



                        <div class="mb-3">

                            <label>Pilih Sparepart</label>

                            <select name="sparepart_id"
                                    class="form-control"
                                    required>


                                <option value="">

                                    -- Pilih Sparepart --

                                </option>


                                @foreach($spareparts as $item)

                                <option value="{{ $item->id }}">


                                    {{ $item->nama_sparepart }}

                                    |

                                    Stok:
                                    {{ $item->stok }}

                                    |

                                    Rp {{ number_format($item->harga,0,',','.') }}


                                </option>


                                @endforeach


                            </select>

                        </div>



                        <div class="mb-3">

                            <label>Jumlah</label>

                            <input type="number"
                                   name="jumlah"
                                   class="form-control"
                                   min="1"
                                   required>

                        </div>



                        <div class="text-end">


                            <a href="{{ route('detail-sparepart.show',$servis->id) }}"
                               class="btn btn-secondary">

                                Kembali

                            </a>


                            <button class="btn btn-info">

                                Simpan

                            </button>


                        </div>



                    </form>


                </div>


            </div>


        </div>


    </div>


</div>


@endsection