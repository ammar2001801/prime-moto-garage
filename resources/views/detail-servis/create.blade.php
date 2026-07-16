@extends('layouts.admin')

@section('title','Tambah Detail Servis')

@section('content')

<div class="container-fluid">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow">

<div class="card-header bg-info text-white">

<h4 class="mb-0">
<i class="fas fa-tools"></i>
Tambah Jasa Servis
</h4>

</div>


<div class="card-body">


<form action="{{ route('detail-servis.store') }}"
      method="POST">

@csrf


<input type="hidden"
       name="servis_id"
       value="{{ $servis->id }}">



<div class="mb-3">

<label>Kode Servis</label>

<input type="text"
       class="form-control"
       value="{{ $servis->kode_servis }}"
       readonly>

</div>



<div class="mb-3">

<label>Nama Pekerjaan</label>

<input type="text"
       name="nama_pekerjaan"
       class="form-control"
       placeholder="Contoh : Ganti Oli"
       required>

</div>



<div class="mb-3">

<label>Biaya Jasa</label>

<input type="number"
       name="biaya_jasa"
       class="form-control"
       placeholder="Contoh : 50000"
       required>

</div>



<div class="mb-3">

<label>Keterangan</label>

<textarea name="keterangan"
          class="form-control"
          rows="3"></textarea>

</div>



<div class="text-end">

<a href="{{ route('servis.index') }}"
   class="btn btn-secondary">

Kembali

</a>


<button class="btn btn-info">

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