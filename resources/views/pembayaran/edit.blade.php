@extends('layouts.admin')

@section('title','Edit Pembayaran')

@section('content')

<div class="container-fluid">


<div class="card shadow">

<div class="card-header bg-warning">

<h3>
<i class="fas fa-edit"></i>
Edit Pembayaran
</h3>

</div>


<div class="card-body">


<form action="{{ route('pembayaran.update',$pembayaran->id) }}"
method="POST">

@csrf
@method('PUT')


<div class="mb-3">

<label>Servis</label>

<select name="servis_id" class="form-control">


@foreach($servis as $item)

<option value="{{ $item->id }}"
@if($item->id == $pembayaran->servis_id)
selected
@endif
>

{{ $item->kode_servis }}
-
{{ $item->kendaraan->plat_nomor }}

</option>

@endforeach


</select>

</div>



<div class="mb-3">

<label>Tanggal Bayar</label>

<input type="date"
name="tanggal_bayar"
class="form-control"
value="{{ date('Y-m-d',strtotime($pembayaran->tanggal_bayar)) }}">


</div>



<div class="mb-3">

<label>Total Tagihan</label>

<input type="number"
class="form-control"
value="{{ $pembayaran->total_tagihan }}"
readonly>


</div>



<div class="mb-3">

<label>Jumlah Bayar</label>

<input type="number"
name="jumlah_bayar"
class="form-control"
value="{{ $pembayaran->bayar }}">


</div>



<div class="mb-3">

<label>Kembalian</label>

<input type="number"
class="form-control"
value="{{ $pembayaran->kembalian }}"
readonly>


</div>



<div class="mb-3">

<label>Metode Bayar</label>

<select name="metode_bayar"
class="form-control">


<option value="Cash"
@if($pembayaran->metode_bayar=="Cash")
selected
@endif
>
Cash
</option>


<option value="Transfer"
@if($pembayaran->metode_bayar=="Transfer")
selected
@endif
>
Transfer
</option>


</select>

</div>



<button class="btn btn-warning">

Update

</button>


<a href="{{ route('pembayaran.index') }}"
class="btn btn-secondary">

Kembali

</a>



</form>


</div>

</div>


</div>


@endsection