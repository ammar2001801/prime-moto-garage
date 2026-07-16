@extends('layouts.admin')

@section('title', 'Data Pelanggan')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-0">
                <i class="fas fa-users text-primary"></i>
                Data Pelanggan
            </h2>

            <small class="text-muted">
                Kelola seluruh data pelanggan bengkel
            </small>
        </div>

        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">

            <i class="fas fa-plus-circle"></i>

            Tambah Pelanggan

        </a>

    </div>

    {{-- Search --}}
    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form method="GET" action="{{ route('pelanggan.index') }}">

                <div class="row">

                    <div class="col-md-10">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Cari nama atau email pelanggan...">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary w-100">

                            <i class="fas fa-search"></i>

                            Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- Table --}}
    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">

                Daftar Pelanggan

            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="60">No</th>

                            <th>Nama</th>

                            <th>Email</th>

                            <th>No HP</th>

                            <th>NIK</th>

                            <th>Alamat</th>

                            <th width="170">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pelanggans as $pelanggan)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ $pelanggan->user->name }}

                            </td>

                            <td>

                                {{ $pelanggan->user->email }}

                            </td>

                            <td>

                                {{ $pelanggan->no_hp }}

                            </td>

                            <td>

                                {{ $pelanggan->nik }}

                            </td>

                            <td>

                                {{ $pelanggan->alamat }}

                            </td>

                            <td>

                                <a href="{{ route('pelanggan.edit',$pelanggan->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form
                                    action="{{ route('pelanggan.destroy',$pelanggan->id) }}"
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

                            <td colspan="7" class="text-center text-muted">

                                Belum ada data pelanggan.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $pelanggans->links() }}

            </div>

        </div>

    </div>

</div>

@endsection