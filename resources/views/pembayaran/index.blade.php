@extends('layouts.admin')

@section('title','Data Pembayaran')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">

        <h3>
            <i class="fas fa-money-bill-wave"></i>
            Data Pembayaran
        </h3>

        <a href="{{ route('pembayaran.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Pembayaran

        </a>

    </div>


    <div class="card shadow">

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-10">

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari Kode Servis..."
                               value="{{ request('search') }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary w-100">

                            Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <br>


    <div class="card shadow">

        <div class="card-header bg-success text-white">

            Data Pembayaran

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Kode Servis</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Metode</th>
                        <th>Status</th>
                        <th width="220">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($pembayarans as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            {{ $item->servis->kode_servis ?? '-' }}

                        </td>

                        <td>

                            {{ $item->servis->kendaraan->pelanggan->user->name ?? '-' }}

                        </td>

                        <td>

                            Rp {{ number_format($item->total_tagihan,0,',','.') }}

                        </td>

                        <td>

                            {{ $item->tanggal_bayar }}

                        </td>

                        <td>

                            {{ $item->metode_bayar }}

                        </td>

                        <td>

                            @if($item->status=="Lunas")

                                <span class="badge bg-success">

                                    {{ $item->status }}

                                </span>

                            @else

                                <span class="badge bg-warning text-dark">

                                    {{ $item->status }}

                                </span>

                            @endif

                        </td>

                        <td>

                            {{-- DETAIL --}}
                            <a href="{{ route('pembayaran.show',$item->id) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>


                            {{-- EDIT --}}
                            <a href="{{ route('pembayaran.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>


                            {{-- HAPUS --}}
                            <form action="{{ route('pembayaran.destroy',$item->id) }}"
                                  method="POST"
                                  class="d-inline form-delete">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center">

                            Belum ada pembayaran.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            {{ $pembayarans->links() }}

        </div>

    </div>

</div>

@endsection