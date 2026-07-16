@extends('layouts.admin')

@section('title','Tambah Pembayaran')

@section('content')

<div class="container-fluid">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4 class="mb-0">
<i class="fas fa-money-bill-wave"></i>
Tambah Pembayaran
</h4>

</div>


<div class="card-body">


<form action="{{ route('pembayaran.store') }}" method="POST">

@csrf


<div class="mb-3">

<label>Servis</label>

<select name="servis_id"
        id="servis"
        class="form-control"
        required>


<option value="">
-- Pilih Servis --
</option>


@foreach($servis as $item)

<option value="{{ $item->id }}"
        data-total="{{ $item->grand_total }}">

{{ $item->kode_servis }}
-
{{ $item->kendaraan->plat_nomor }}

-
Rp {{ number_format($item->grand_total,0,',','.') }}

</option>

@endforeach


</select>

</div>



<div class="mb-3">

<label>Tanggal Bayar</label>

<input type="date"
       name="tanggal_bayar"
       class="form-control"
       value="{{ date('Y-m-d') }}"
       required>

</div>



<div class="mb-3">

<label>Total Tagihan</label>

<input type="number"
       id="total_tagihan"
       class="form-control"
       readonly>

</div>



<div class="mb-3">

<label>Jumlah Bayar</label>

<input type="number"
       name="jumlah_bayar"
       id="bayar"
       class="form-control"
       required>

</div>



<div class="mb-3">

<label>Kembalian</label>

<input type="number"
       id="kembalian"
       class="form-control"
       readonly>

</div>



<div class="mb-3">

<label>Metode Bayar</label>


<select name="metode_bayar"
        class="form-control"
        required>


<option value="Cash">
Cash
</option>


<option value="Transfer">
Transfer
</option>


<option value="QRIS">
QRIS
</option>


</select>

</div>



<div class="text-end">


<a href="{{ route('pembayaran.index') }}"
   class="btn btn-secondary">

Kembali

</a>


<button class="btn btn-success">

Simpan

</button>


</div>


</form>


</div>

</div>

</div>

</div>

</div>



<script>


let servis = document.getElementById('servis');

let total = document.getElementById('total_tagihan');

let bayar = document.getElementById('bayar');

let kembali = document.getElementById('kembalian');



servis.addEventListener('change',function(){

let harga =
this.options[this.selectedIndex].dataset.total;


total.value = harga ?? 0;


hitung();


});



bayar.addEventListener('keyup',function(){

hitung();

});



function hitung(){

let hasil =
(bayar.value || 0) - (total.value || 0);


kembali.value = hasil;


}


</script>


@endsection