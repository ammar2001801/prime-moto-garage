<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Laporan Pembayaran | Prime Moto Garage</title>

    <style>

        body{
            font-family:Arial, Helvetica, sans-serif;
            font-size:13px;
            margin:30px;
            color:#000;
        }

        .header{
            text-align:center;
            margin-bottom:20px;
        }

        .header h2{
            margin:0;
            color:#0d6efd;
        }

        .header h4{
            margin:5px 0;
        }

        .header p{
            margin:2px;
        }

        hr{
            border:1px solid #000;
            margin-top:10px;
            margin-bottom:15px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:6px;
        }

        table th{
            background:#efefef;
        }

        .text-center{
            text-align:center;
        }

        .text-right{
            text-align:right;
        }

        .summary{
            width:40%;
            float:right;
            margin-top:20px;
        }

        .summary td{
            border:none;
            padding:4px;
        }

        .footer{
            clear:both;
            margin-top:80px;
        }

        .signature{
            width:250px;
            float:right;
            text-align:center;
        }

    </style>

</head>

<body>

<div class="header">

    <h2>

        PRIME MOTO GARAGE

    </h2>

    <h4>

        Professional Motorcycle Service

    </h4>

    <p>

        Jl. HR. Soebrantas No. 88, Pekanbaru

    </p>

    <p>

        Telp. 0812-1234-5678

    </p>

    <hr>

    <h3>

        LAPORAN PEMBAYARAN

    </h3>

    @if(request('tanggal_awal') && request('tanggal_akhir'))

        <p>

            Periode :

            <b>

                {{ \Carbon\Carbon::parse(request('tanggal_awal'))->format('d-m-Y') }}

                s/d

                {{ \Carbon\Carbon::parse(request('tanggal_akhir'))->format('d-m-Y') }}

            </b>

        </p>

    @else

        <p>

            Periode :

            <b>

                Semua Data

            </b>

        </p>

    @endif

</div>

<table>

    <thead>

    <tr>

        <th width="40">No</th>

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
        $total = 0;
    @endphp

    @forelse($laporan as $item)

        @php
            $total += $item->total_tagihan;
        @endphp

        <tr>

            <td class="text-center">

                {{ $loop->iteration }}

            </td>

            <td>

                {{ $item->servis->kode_servis }}

            </td>

            <td>

                {{ $item->servis->kendaraan->pelanggan->user->name }}

            </td>

            <td>

                {{ $item->servis->kendaraan->plat_nomor }}

            </td>

            <td class="text-center">

                {{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') }}

            </td>

            <td class="text-center">

                {{ $item->metode_bayar }}

            </td>

            <td class="text-right">

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

</table>

<table class="summary">

    <tr>

        <td>

            Jumlah Transaksi

        </td>

        <td>

            :

        </td>

        <td>

            {{ count($laporan) }}

        </td>

    </tr>

    <tr>

        <td>

            Total Pendapatan

        </td>

        <td>

            :

        </td>

        <td>

            <b>

                Rp {{ number_format($total,0,',','.') }}

            </b>

        </td>

    </tr>

</table>

<div class="footer">

    <div class="signature">

        Pekanbaru,

        {{ now()->format('d-m-Y') }}

        <br>

        {{ now()->format('H:i') }} WIB

        <br><br><br><br>

        _______________________

        <br>

        <b>

            {{ Auth::user()->name }}

        </b>

        <br>

        Administrator

    </div>

</div>

<script>

window.print();

</script>

</body>

</html>