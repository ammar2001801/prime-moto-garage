@extends('layouts.admin')

@section('title', 'Tambah Mekanik')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">

                        <i class="fas fa-user-cog mr-2"></i>

                        Tambah Data Mekanik

                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('mekanik.store') }}" method="POST">

                        @csrf

                        <div class="form-group">

                            <label>Nama Mekanik</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                required>

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                required>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label>Password</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                required>

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label>No HP</label>

                            <input
                                type="text"
                                name="no_hp"
                                class="form-control @error('no_hp') is-invalid @enderror"
                                value="{{ old('no_hp') }}"
                                required>

                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label>Spesialisasi</label>

                            <select
                                name="spesialisasi"
                                class="form-control @error('spesialisasi') is-invalid @enderror"
                                required>

                                <option value="">-- Pilih Spesialisasi --</option>

                                <option value="Mesin">Mesin</option>
                                <option value="Kelistrikan">Kelistrikan</option>
                                <option value="Body Repair">Body Repair</option>
                                <option value="Ban & Kaki-kaki">Ban & Kaki-kaki</option>
                                <option value="Tune Up">Tune Up</option>

                            </select>

                            @error('spesialisasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="text-right">

                            <a href="{{ route('mekanik.index') }}"
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