@extends('layouts.admin')

@section('title','Tambah Servis')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">

                        <i class="fas fa-tools"></i>

                        Tambah Servis

                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('servis.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label>Tanggal Servis</label>

                            <input type="date"
                                   name="tanggal_servis"
                                   class="form-control"
                                   value="{{ date('Y-m-d') }}"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>Kendaraan</label>

                            <select name="kendaraan_id"
                                    class="form-control"
                                    required>

                                <option value="">-- Pilih Kendaraan --</option>

                                @foreach($kendaraans as $kendaraan)

                                    <option value="{{ $kendaraan->id }}">

                                        {{ $kendaraan->plat_nomor }}
                                        -
                                        {{ $kendaraan->pelanggan->user->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="mb-3">

                            <label>Mekanik</label>

                            <select name="mekanik_id"
                                    class="form-control"
                                    required>

                                <option value="">-- Pilih Mekanik --</option>

                                @foreach($mekaniks as $mekanik)

                                    <option value="{{ $mekanik->id }}">

                                        {{ $mekanik->user->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="mb-3">

                            <label>Keluhan</label>

                            <textarea
                                name="keluhan"
                                rows="3"
                                class="form-control"
                                required></textarea>

                        </div>

                        <div class="mb-3">

                            <label>Diagnosa</label>

                            <textarea
                                name="diagnosa"
                                rows="3"
                                class="form-control"></textarea>

                        </div>

                        <div class="mb-3">
                                <label>Status</label>

                                <select name="status" class="form-control">

                                     <option value="Antri">Antri</option>

                                    <option value="Dikerjakan">Dikerjakan</option>

                                    <option value="Selesai">Selesai</option>

                                </select>

                            </div>

                        <div class="text-end">

                            <a href="{{ route('servis.index') }}"
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