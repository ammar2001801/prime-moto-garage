@extends('layouts.admin')

@section('title','Edit Sparepart')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-warning text-dark">

                    <h4 class="mb-0">

                        <i class="fas fa-edit mr-2"></i>

                        Edit Sparepart

                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('sparepart.update',$sparepart->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="form-group">

                            <label>Kategori Sparepart</label>

                            <select
                                name="kategori_id"
                                class="form-control"
                                required>

                                @foreach($kategori as $item)

                                <option
                                    value="{{ $item->id }}"
                                    {{ $sparepart->kategori_id==$item->id ? 'selected' : '' }}>

                                    {{ $item->nama_kategori }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">

                            <label>Nama Sparepart</label>

                            <input
                                type="text"
                                name="nama_sparepart"
                                class="form-control"
                                value="{{ old('nama_sparepart',$sparepart->nama_sparepart) }}"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Kode Sparepart</label>

                            <input
                                type="text"
                                name="kode_sparepart"
                                class="form-control"
                                value="{{ old('kode_sparepart',$sparepart->kode_sparepart) }}"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Satuan</label>

                            <select
                                name="satuan"
                                class="form-control"
                                required>

                                <option value="PCS" {{ $sparepart->satuan=='PCS' ? 'selected' : '' }}>PCS</option>

                                <option value="BOTOL" {{ $sparepart->satuan=='BOTOL' ? 'selected' : '' }}>BOTOL</option>

                                <option value="SET" {{ $sparepart->satuan=='SET' ? 'selected' : '' }}>SET</option>

                                <option value="UNIT" {{ $sparepart->satuan=='UNIT' ? 'selected' : '' }}>UNIT</option>

                                <option value="LITER" {{ $sparepart->satuan=='LITER' ? 'selected' : '' }}>LITER</option>

                            </select>

                        </div>

                        <div class="form-group">

                            <label>Stok</label>

                            <input
                                type="number"
                                name="stok"
                                class="form-control"
                                value="{{ old('stok',$sparepart->stok) }}"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Harga</label>

                            <input
                                type="number"
                                name="harga"
                                class="form-control"
                                value="{{ old('harga',$sparepart->harga) }}"
                                required>

                        </div>

                        <div class="text-right">

                            <a href="{{ route('sparepart.index') }}"
                               class="btn btn-secondary">

                                <i class="fas fa-arrow-left"></i>

                                Kembali

                            </a>

                            <button
                                type="submit"
                                class="btn btn-warning">

                                <i class="fas fa-save"></i>

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