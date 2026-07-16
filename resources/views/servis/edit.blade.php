@extends('layouts.admin')

@section('title','Edit Servis')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-warning">

                    <h4 class="mb-0">

                        <i class="fas fa-edit"></i>

                        Edit Servis

                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('servis.update',$servis->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label>Tanggal Servis</label>

                            <input type="date"
                                   name="tanggal_servis"
                                   class="form-control"
                                   value="{{ old('tanggal_servis',$servis->tanggal_servis) }}"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>Kendaraan</label>

                            <select name="kendaraan_id"
                                    class="form-control"
                                    required>

                                @foreach($kendaraans as $kendaraan)

                                    <option value="{{ $kendaraan->id }}"
                                        {{ $servis->kendaraan_id == $kendaraan->id ? 'selected' : '' }}>

                                        {{ $kendaraan->plat_nomor }} -
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

                                @foreach($mekaniks as $mekanik)

                                    <option value="{{ $mekanik->id }}"
                                        {{ $servis->mekanik_id == $mekanik->id ? 'selected' : '' }}>

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
                                required>{{ old('keluhan',$servis->keluhan) }}</textarea>

                        </div>

                        <div class="mb-3">

                            <label>Diagnosa</label>

                            <textarea
                                name="diagnosa"
                                rows="3"
                                class="form-control">{{ old('diagnosa',$servis->diagnosa) }}</textarea>

                        </div>

                       <div class="mb-3">
    <label>Status</label>

    <select name="status" class="form-control">

        <option value="Antri"
            {{ $servis->status=='Antri' ? 'selected' : '' }}>
            Antri
        </option>

        <option value="Dikerjakan"
            {{ $servis->status=='Dikerjakan' ? 'selected' : '' }}>
            Dikerjakan
        </option>

        <option value="Selesai"
            {{ $servis->status=='Selesai' ? 'selected' : '' }}>
            Selesai
        </option>

    </select>

</div>

                        <div class="text-end">

                            <a href="{{ route('servis.index') }}"
                               class="btn btn-secondary">

                                Kembali

                            </a>

                            <button class="btn btn-warning">

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