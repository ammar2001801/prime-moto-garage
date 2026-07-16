@extends('layouts.admin')

@section('title', 'Edit Kategori Sparepart')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-warning text-dark">

                    <h4 class="mb-0">

                        <i class="fas fa-edit mr-2"></i>

                        Edit Kategori Sparepart

                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('kategori-sparepart.update',$kategori->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="form-group">

                            <label>Nama Kategori</label>

                            <input
                                type="text"
                                name="nama_kategori"
                                class="form-control @error('nama_kategori') is-invalid @enderror"
                                value="{{ old('nama_kategori',$kategori->nama_kategori) }}"
                                required>

                            @error('nama_kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label>Kode Sparepart</label>

                            <input
                                type="text"
                                name="kode_sparepart"
                                class="form-control @error('kode_sparepart') is-invalid @enderror"
                                value="{{ old('kode_sparepart',$kategori->kode_sparepart) }}"
                                required>

                            @error('kode_sparepart')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label>Satuan</label>

                            <select
                                name="satuan"
                                class="form-control @error('satuan') is-invalid @enderror"
                                required>

                                <option value="PCS" {{ $kategori->satuan=='PCS' ? 'selected' : '' }}>PCS</option>
                                <option value="BOTOL" {{ $kategori->satuan=='BOTOL' ? 'selected' : '' }}>BOTOL</option>
                                <option value="SET" {{ $kategori->satuan=='SET' ? 'selected' : '' }}>SET</option>
                                <option value="UNIT" {{ $kategori->satuan=='UNIT' ? 'selected' : '' }}>UNIT</option>
                                <option value="LITER" {{ $kategori->satuan=='LITER' ? 'selected' : '' }}>LITER</option>

                            </select>

                            @error('satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label>Keterangan</label>

                            <textarea
                                name="keterangan"
                                rows="4"
                                class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan',$kategori->keterangan) }}</textarea>

                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="text-right">

                            <a href="{{ route('kategori-sparepart.index') }}"
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