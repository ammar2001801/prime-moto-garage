<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Nota Pembayaran | Prime Moto Garage</title>

    <style>

        body{
            font-family:Arial,Helvetica,sans-serif;
            margin:30px;
            color:#000;
            font-size:14px;
        }

        .text-center{
            text-align:center;
        }

        .line{
            border-top:1px dashed #000;
            margin:15px 0;
        }

        h2{
            margin-bottom:0;
        }

        h4{
            margin:0;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table td,
        table th{
            padding:6px;
        }

        .table-detail{
            margin-top:10px;
        }

        .table-detail th{
            border-bottom:1px solid #000;
            text-align:left;
        }

        .table-detail td{
            border-bottom:1px dashed #ddd;
        }

        .right{
            text-align:right;
        }

        .bold{
            font-weight:bold;
        }

        .footer{
            margin-top:30px;
            text-align:center;
        }

        button{
            padding:10px 20px;
            border:none;
            background:#0d6efd;
            color:white;
            border-radius:5px;
            cursor:pointer;
        }

        @media print{

            button{
                display:none;
            }

        }

    </style>

</head>

<body>

<div class="text-center">

    <h2>

        PRIME MOTO GARAGE

    </h2>

    <h4>

        Professional Motorcycle Service

    </h4>

    <small>

        Jl. HR. Soebrantas No. 88, Pekanbaru

    </small>

    <br>

    <small>

        Telp : 0812-1234-5678

    </small>

</div>

<div class="line"></div>

<table>

    <tr>

        <td width="170">

            Kode Servis

        </td>

        <td>

            : {{ $pembayaran->servis->kode_servis }}

        </td>

    </tr>

    <tr>

        <td>

            Tanggal

        </td>

        <td>

            : {{ date('d-m-Y', strtotime($pembayaran->tanggal_bayar)) }}

        </td>

    </tr>

    <tr>

        <td>

            Pelanggan

        </td>

        <td>

            : {{ $pembayaran->servis->kendaraan->pelanggan->user->name }}

        </td>

    </tr>

    <tr>

        <td>

            Plat Nomor

        </td>

        <td>

            : {{ $pembayaran->servis->kendaraan->plat_nomor }}

        </td>

    </tr>

</table>

<div class="line"></div>

<h4>

    JASA SERVIS

</h4>

<table class="table-detail">

    <thead>

    <tr>

        <th>

            Pekerjaan

        </th>

        <th class="right">

            Biaya

        </th>

    </tr>

    </thead>

    <tbody>

    @foreach($pembayaran->servis->detailServis as $item)

        <tr>

            <td>

                {{ $item->nama_pekerjaan }}

            </td>

            <td class="right">

                Rp {{ number_format($item->biaya_jasa,0,',','.') }}

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

<br>

<h4>

    SPAREPART

</h4>

<table class="table-detail">

    <thead>

    <tr>

        <th>

            Nama Sparepart

        </th>

        <th class="right">

            Qty

        </th>

        <th class="right">

            Subtotal

        </th>

    </tr>

    </thead>

    <tbody>

    @foreach($pembayaran->servis->detailSpareparts as $item)

        <tr>

            <td>

                {{ $item->sparepart->nama_sparepart }}

            </td>

            <td class="right">

                {{ $item->jumlah }}

            </td>

            <td class="right">

                Rp {{ number_format($item->subtotal,0,',','.') }}

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

<div class="line"></div>

<table>

    <tr>

        <td>

            Total Jasa

        </td>

        <td class="right">

            Rp {{ number_format($pembayaran->servis->total_jasa,0,',','.') }}

        </td>

    </tr>

    <tr>

        <td>

            Total Sparepart

        </td>

        <td class="right">

            Rp {{ number_format($pembayaran->servis->total_sparepart,0,',','.') }}

        </td>

    </tr>

    <tr class="bold">

        <td>

            GRAND TOTAL

        </td>

        <td class="right">

            Rp {{ number_format($pembayaran->servis->grand_total,0,',','.') }}

        </td>

    </tr>

    <tr>

        <td>

            Bayar

        </td>

        <td class="right">

            Rp {{ number_format($pembayaran->jumlah_bayar,0,',','.') }}

        </td>

    </tr>

    <tr>

        <td>

            Kembalian

        </td>

        <td class="right">

            Rp {{ number_format($pembayaran->kembalian,0,',','.') }}

        </td>

    </tr>

</table>

<div class="line"></div>

<div class="footer">

    <strong>

        TERIMA KASIH

    </strong>

    <br>

    Telah Mempercayakan Kendaraan Anda

    <br>

    kepada

    <br>

    <strong>

        Prime Moto Garage

    </strong>

    <br><br>

    <button onclick="window.print()">

        🖨 Cetak Nota

    </button>

</div>

<script>

window.onload=function(){

    window.print();

}

</script>

</body>

</html>