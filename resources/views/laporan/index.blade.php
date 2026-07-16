@extends('layouts.admin')

@section('title','Laporan Pembayaran')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>
            <i class="fas fa-chart-bar"></i>
            Laporan Pembayaran
        </h3>

        <a href="{{ route('laporan.cetak', request()->all()) }}"
           target="_blank"
           class="btn btn-success">

            <i class="fas fa-print"></i>
            Cetak Laporan

        </a>

    </div>

    <div class="card shadow mb-4">

        <div class="card-header bg-primary text-white">

            Filter Tanggal

        </div>

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-4">

                        <label>Tanggal Awal</label>

                        <input
                            type="date"
                            name="tanggal_awal"
                            class="form-control"
                            value="{{ request('tanggal_awal') }}">

                    </div>

                    <div class="col-md-4">

                        <label>Tanggal Akhir</label>

                        <input
                            type="date"
                            name="tanggal_akhir"
                            class="form-control"
                            value="{{ request('tanggal_akhir') }}">

                    </div>

                    <div class="col-md-4 d-flex align-items-end">

                        <button class="btn btn-primary w-100">

                            <i class="fas fa-search"></i>

                            Tampilkan

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            Data Laporan

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-primary">

                    <tr>

                        <th>No</th>
                        <th>Kode Servis</th>
                        <th>Pelanggan</th>
                        <th>Plat Nomor</th>
                        <th>Tanggal</th>
                        <th>Metode</th>
                        <th>Total</th>

                    </tr>

                </thead>

                <tbody>

                    @php
                        $grandTotal = 0;
                    @endphp

                    @forelse($laporan as $item)

                    @php
                        $grandTotal += $item->total_tagihan;
                    @endphp

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            {{ $item->servis->kode_servis }}

                        </td>

                        <td>

                            {{ $item->servis->kendaraan->pelanggan->user->name }}

                        </td>

                        <td>

                            {{ $item->servis->kendaraan->plat_nomor }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') }}

                        </td>

                        <td>

                            {{ $item->metode_bayar }}

                        </td>

                        <td>

                            Rp {{ number_format($item->total_tagihan,0,',','.') }}

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            Tidak ada data.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

                <tfoot>

                    <tr class="table-dark">

                        <th colspan="6">

                            Total Pendapatan

                        </th>

                        <th>

                            Rp {{ number_format($grandTotal,0,',','.') }}

                        </th>

                    </tr>

                </tfoot>

            </table>

        </div>

    </div>

</div>

@endsection