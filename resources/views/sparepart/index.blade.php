@extends('layouts.admin')

@section('title', 'Data Sparepart')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="font-weight-bold">
                <i class="fas fa-cogs text-primary"></i>
                Data Sparepart
            </h2>

            <p class="text-muted mb-0">
                Kelola seluruh data sparepart bengkel
            </p>

        </div>

        <a href="{{ route('sparepart.create') }}" class="btn btn-primary shadow">

            <i class="fas fa-plus-circle"></i>

            Tambah Sparepart

        </a>

    </div>

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form action="{{ route('sparepart.index') }}" method="GET">

                <div class="row">

                    <div class="col-md-10">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari nama atau kode sparepart..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary btn-block">

                            <i class="fas fa-search"></i>

                            Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">

                Daftar Sparepart

            </h5>

        </div>

        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0">

                <thead class="bg-primary text-white">

                    <tr>

                        <th width="60">No</th>
                        <th>Kategori</th>
                        <th>Nama Sparepart</th>
                        <th>Kode</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th width="150">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($spareparts as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->kategori->nama_kategori }}</td>

                        <td>{{ $item->nama_sparepart }}</td>

                        <td>{{ $item->kode_sparepart }}</td>

                        <td>{{ $item->satuan }}</td>

                        <td>{{ $item->stok }}</td>

                        <td>Rp {{ number_format($item->harga,0,',','.') }}</td>

                        <td>

                            <a href="{{ route('sparepart.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form
                                action="{{ route('sparepart.destroy',$item->id) }}"
                                method="POST"
                                class="d-inline form-delete">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            Belum ada data sparepart.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">

            {{ $spareparts->links() }}

        </div>

    </div>

</div>

@endsection