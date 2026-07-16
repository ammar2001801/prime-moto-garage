@extends('layouts.admin')

@section('title','Edit Detail Servis')


@section('content')


<div class="container-fluid">


<div class="card shadow">


<div class="card-header bg-warning">


<h4>

<i class="fas fa-edit"></i>

Edit Jasa Servis

</h4>


</div>



<div class="card-body">



<form action="{{ route('detail-servis.update',['detail_servi'=>$detailServis->id]) }}"
method="POST">


@csrf

@method('PUT')




<div class="mb-3">


<label>
Nama Pekerjaan
</label>


<input type="text"
name="nama_pekerjaan"
class="form-control"
value="{{ $detailServis->nama_pekerjaan }}"
required>


</div>




<div class="mb-3">


<label>
Biaya Jasa
</label>


<input type="number"
name="biaya_jasa"
class="form-control"
value="{{ $detailServis->biaya_jasa }}"
required>


</div>




<div class="mb-3">


<label>
Keterangan
</label>


<textarea name="keterangan"
class="form-control"
rows="3">{{ $detailServis->keterangan }}</textarea>


</div>



<button class="btn btn-warning">

Update

</button>



<a href="{{ route('detail-servis.show',$detailServis->servis_id) }}"
class="btn btn-secondary">

Kembali

</a>



</form>



</div>



</div>



</div>


@endsection