@extends('layouts.admin')

@section('title','Data Detail Servis')

@section('content')

<div class="container-fluid">


<div class="d-flex justify-content-between mb-3">

    <h3>
        <i class="fas fa-tools"></i>
        Data Detail Servis
    </h3>

</div>



<div class="card shadow">


<div class="card-header bg-info text-white">

    Detail Pekerjaan Servis

</div>



<div class="card-body table-responsive">


<table class="table table-bordered table-hover">


<thead>

<tr>

<th>No</th>
<th>Kode Servis</th>
<th>Pekerjaan</th>
<th>Biaya</th>
<th>Keterangan</th>
<th width="150">Aksi</th>

</tr>

</thead>


<tbody>


@forelse($detailServis as $item)


<tr>

<td>
{{ $loop->iteration }}
</td>


<td>
{{ $item->servis->kode_servis ?? '-' }}
</td>


<td>
{{ $item->nama_pekerjaan }}
</td>


<td>
Rp {{ number_format($item->biaya_jasa,0,',','.') }}
</td>


<td>
{{ $item->keterangan ?? '-' }}
</td>


<td>


<a href="{{ route('detail-servis.edit',$item->id) }}"
class="btn btn-warning btn-sm">

<i class="fas fa-edit"></i>

</a>



<form action="{{ route('detail-servis.destroy',$item->id) }}"
method="POST"
class="d-inline">


@csrf

@method('DELETE')


<button class="btn btn-danger btn-sm"
onclick="return confirm('Hapus jasa ini?')">

<i class="fas fa-trash"></i>

</button>


</form>


</td>


</tr>


@empty


<tr>

<td colspan="6" class="text-center">

Belum ada detail servis.

</td>

</tr>


@endforelse


</tbody>


</table>


</div>


</div>


</div>


@endsection