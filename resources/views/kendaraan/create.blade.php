@extends('layouts.admin')

@section('title', 'Tambah Kendaraan')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        <i class="fas fa-car"></i>
                        Tambah Kendaraan
                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('kendaraan.store') }}" method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label>Pelanggan</label>

                                <select
                                    name="pelanggan_id"
                                    class="form-select"
                                    required>

                                    <option value="">-- Pilih Pelanggan --</option>

                                    @foreach($pelanggans as $pelanggan)

                                        <option value="{{ $pelanggan->id }}">

                                            {{ $pelanggan->user->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Plat Nomor</label>

                                <input
                                    type="text"
                                    name="plat_nomor"
                                    class="form-control"
                                    required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Merk</label>

                                <input
                                    type="text"
                                    name="merk"
                                    class="form-control"
                                    required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Tipe</label>

                                <input
                                    type="text"
                                    name="tipe"
                                    class="form-control"
                                    required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Warna</label>

                                <input
                                    type="text"
                                    name="warna"
                                    class="form-control">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Tahun</label>

                                <input
                                    type="number"
                                    name="tahun"
                                    class="form-control"
                                    min="1980"
                                    max="{{ date('Y') }}"
                                    required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Nomor Rangka</label>

                                <input
                                    type="text"
                                    name="nomor_rangka"
                                    class="form-control">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Nomor Mesin</label>

                                <input
                                    type="text"
                                    name="nomor_mesin"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="text-end mt-3">

                            <a href="{{ route('kendaraan.index') }}"
                               class="btn btn-secondary">

                                Kembali

                            </a>

                            <button class="btn btn-primary">

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