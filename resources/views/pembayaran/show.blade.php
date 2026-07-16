@extends('layouts.admin')

@section('title','Detail Pembayaran')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">

        <h3>

            <i class="fas fa-money-bill-wave"></i>

            Detail Pembayaran

        </h3>

        <div>

            <a href="{{ route('pembayaran.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Kembali

            </a>

           <a href="{{ route('pembayaran.nota',$pembayaran->id) }}"
                target="_blank"
                class="btn btn-success">

            <i class="fas fa-print"></i>

            Cetak Nota

            </a>

        </div>

    </div>



    <div class="card shadow mb-3">

        <div class="card-header bg-primary text-white">

            Informasi Pembayaran

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">

                    <strong>Kode Servis</strong>

                    <p>{{ $pembayaran->servis->kode_servis }}</p>

                </div>

                <div class="col-md-4">

                    <strong>Tanggal Bayar</strong>

                    <p>{{ $pembayaran->tanggal_bayar }}</p>

                </div>

                <div class="col-md-4">

                    <strong>Status</strong>

                    @if($pembayaran->status=="Lunas")

                        <span class="badge bg-success">

                            {{ $pembayaran->status }}

                        </span>

                    @else

                        <span class="badge bg-warning">

                            {{ $pembayaran->status }}

                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>




    <div class="card shadow mb-3">

        <div class="card-header bg-info text-white">

            Data Pelanggan

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">

                    <strong>Nama</strong>

                    <p>

                        {{ $pembayaran->servis->kendaraan->pelanggan->user->name }}

                    </p>

                </div>

                <div class="col-md-4">

                    <strong>Plat Nomor</strong>

                    <p>

                        {{ $pembayaran->servis->kendaraan->plat_nomor }}

                    </p>

                </div>

                <div class="col-md-4">

                    <strong>Kendaraan</strong>

                    <p>

                        {{ $pembayaran->servis->kendaraan->merk }}

                    </p>

                </div>

            </div>

        </div>

    </div>






    <div class="card shadow mb-3">

        <div class="card-header bg-success text-white">

            Detail Jasa

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Pekerjaan</th>

                        <th>Biaya</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($pembayaran->servis->detailServis as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->nama_pekerjaan }}</td>

                        <td>

                            Rp {{ number_format($item->biaya_jasa,0,',','.') }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3"
                            class="text-center">

                            Tidak ada jasa.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>






    <div class="card shadow mb-3">

        <div class="card-header bg-warning">

            Detail Sparepart

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Sparepart</th>

                        <th>Jumlah</th>

                        <th>Subtotal</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($pembayaran->servis->detailSpareparts as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->sparepart->nama_sparepart }}</td>

                        <td>{{ $item->jumlah }}</td>

                        <td>

                            Rp {{ number_format($item->subtotal,0,',','.') }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                            class="text-center">

                            Tidak ada sparepart.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>






    <div class="card shadow">

        <div class="card-header bg-dark text-white">

            Ringkasan Pembayaran

        </div>

        <div class="card-body">

            <table class="table">

                <tr>

                    <th width="250">

                        Total Jasa

                    </th>

                    <td>

                        Rp {{ number_format($pembayaran->servis->total_jasa,0,',','.') }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Total Sparepart

                    </th>

                    <td>

                        Rp {{ number_format($pembayaran->servis->total_sparepart,0,',','.') }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Grand Total

                    </th>

                    <td>

                        <strong>

                            Rp {{ number_format($pembayaran->total_tagihan,0,',','.') }}

                        </strong>

                    </td>

                </tr>

                <tr>

                    <th>

                        Bayar

                    </th>

                    <td>

                        Rp {{ number_format($pembayaran->bayar,0,',','.') }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Kembalian

                    </th>

                    <td>

                        Rp {{ number_format($pembayaran->kembalian,0,',','.') }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Metode Pembayaran

                    </th>

                    <td>

                        {{ $pembayaran->metode_bayar }}

                    </td>

                </tr>

            </table>

        </div>

    </div>

</div>

@endsection