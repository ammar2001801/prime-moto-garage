@extends('layouts.admin')

@section('title','Tambah Sparepart')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">

                        <i class="fas fa-cogs mr-2"></i>

                        Tambah Sparepart

                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('sparepart.store') }}" method="POST">

                        @csrf

                        <div class="form-group">

                            <label>Kategori Sparepart</label>

                            <select
                                name="kategori_id"
                                class="form-control @error('kategori_id') is-invalid @enderror"
                                required>

                                <option value="">-- Pilih Kategori --</option>

                                @foreach($kategori as $item)

                                    <option value="{{ $item->id }}">

                                        {{ $item->nama_kategori }}

                                    </option>

                                @endforeach

                            </select>

                            @error('kategori_id')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                            @enderror

                        </div>

                        <div class="form-group">

                            <label>Nama Sparepart</label>

                            <input
                                type="text"
                                name="nama_sparepart"
                                class="form-control"
                                value="{{ old('nama_sparepart') }}"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Kode Sparepart</label>

                            <input
                                type="text"
                                name="kode_sparepart"
                                class="form-control"
                                placeholder="SP001"
                                value="{{ old('kode_sparepart') }}"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Satuan</label>

                            <select
                                name="satuan"
                                class="form-control"
                                required>

                                <option value="PCS">PCS</option>
                                <option value="BOTOL">BOTOL</option>
                                <option value="SET">SET</option>
                                <option value="UNIT">UNIT</option>
                                <option value="LITER">LITER</option>

                            </select>

                        </div>

                        <div class="form-group">

                            <label>Stok</label>

                            <input
                                type="number"
                                name="stok"
                                class="form-control"
                                value="{{ old('stok') }}"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Harga</label>

                            <input
                                type="number"
                                name="harga"
                                class="form-control"
                                value="{{ old('harga') }}"
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
                                class="btn btn-primary">

                                <i class="fas fa-save"></i>

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