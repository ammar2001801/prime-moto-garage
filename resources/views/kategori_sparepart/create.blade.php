@extends('layouts.admin')

@section('title', 'Tambah Kategori Sparepart')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">

                        <i class="fas fa-tags mr-2"></i>

                        Tambah Kategori Sparepart

                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('kategori-sparepart.store') }}" method="POST">

                        @csrf

                        <div class="form-group">

                            <label>Nama Kategori</label>

                            <input
                                type="text"
                                name="nama_kategori"
                                class="form-control @error('nama_kategori') is-invalid @enderror"
                                value="{{ old('nama_kategori') }}"
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
                                value="{{ old('kode_sparepart') }}"
                                placeholder="Contoh : SP001"
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

                                <option value="">-- Pilih Satuan --</option>

                                <option value="PCS">PCS</option>
                                <option value="BOTOL">BOTOL</option>
                                <option value="SET">SET</option>
                                <option value="UNIT">UNIT</option>
                                <option value="LITER">LITER</option>

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
                                class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>

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