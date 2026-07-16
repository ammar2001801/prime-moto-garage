@extends('layouts.admin')

@section('title', 'Edit Mekanik')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-warning text-dark">

                    <h4 class="mb-0">

                        <i class="fas fa-user-edit mr-2"></i>

                        Edit Data Mekanik

                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('mekanik.update',$mekanik->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="form-group">

                            <label>Nama Mekanik</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name',$mekanik->user->name) }}"
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
                                value="{{ old('email',$mekanik->user->email) }}"
                                required>

                            @error('email')
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
                                value="{{ old('no_hp',$mekanik->no_hp) }}"
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

                                <option value="Mesin"
                                    {{ $mekanik->spesialisasi=='Mesin' ? 'selected' : '' }}>
                                    Mesin
                                </option>

                                <option value="Kelistrikan"
                                    {{ $mekanik->spesialisasi=='Kelistrikan' ? 'selected' : '' }}>
                                    Kelistrikan
                                </option>

                                <option value="Body Repair"
                                    {{ $mekanik->spesialisasi=='Body Repair' ? 'selected' : '' }}>
                                    Body Repair
                                </option>

                                <option value="Ban & Kaki-kaki"
                                    {{ $mekanik->spesialisasi=='Ban & Kaki-kaki' ? 'selected' : '' }}>
                                    Ban & Kaki-kaki
                                </option>

                                <option value="Tune Up"
                                    {{ $mekanik->spesialisasi=='Tune Up' ? 'selected' : '' }}>
                                    Tune Up
                                </option>

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