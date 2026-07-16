@extends('layouts.admin')

@section('title', 'Tambah Pelanggan')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                <i class="fas fa-user-plus"></i>
                Tambah Pelanggan
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('pelanggan.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Nama</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}">

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Email</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}">

                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Password</label>

                        <input type="password"
                               name="password"
                               class="form-control">

                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">No HP</label>

                        <input type="text"
                               name="no_hp"
                               class="form-control"
                               value="{{ old('no_hp') }}">

                        @error('no_hp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">NIK</label>

                        <input type="text"
                               name="nik"
                               class="form-control"
                               value="{{ old('nik') }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Alamat</label>

                        <textarea name="alamat"
                                  rows="3"
                                  class="form-control">{{ old('alamat') }}</textarea>

                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                </div>

                <a href="{{ route('pelanggan.index') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Kembali

                </a>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="fas fa-save"></i>
                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection