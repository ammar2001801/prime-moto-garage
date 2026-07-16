@extends('layouts.admin')

@section('title', 'Data Kendaraan')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>
            <i class="fas fa-car text-primary"></i>
            Data Kendaraan
        </h3>

        <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Tambah Kendaraan

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow">

        <div class="card-header">

            <div class="row">

                <div class="col-md-4">

                    <form action="{{ route('kendaraan.index') }}" method="GET">

                        <div class="input-group">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari Plat / Merk..."
                                value="{{ request('search') }}">

                            <button class="btn btn-primary">

                                <i class="fas fa-search"></i>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-dark">

                        <tr>

                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Plat Nomor</th>
                            <th>Merk</th>
                            <th>Tipe</th>
                            <th>Warna</th>
                            <th>Tahun</th>
                            <th width="170">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($kendaraans as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->pelanggan->user->name }}</td>

                            <td>{{ $item->plat_nomor }}</td>

                            <td>{{ $item->merk }}</td>

                            <td>{{ $item->tipe }}</td>

                            <td>{{ $item->warna }}</td>

                            <td>{{ $item->tahun }}</td>

                            <td>

                                <a href="{{ route('kendaraan.edit',$item->id) }}"
                                    class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form
                                    action="{{ route('kendaraan.destroy',$item->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8" class="text-center">

                                Belum ada data kendaraan.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $kendaraans->links() }}

            </div>

        </div>

    </div>

</div>

@endsection