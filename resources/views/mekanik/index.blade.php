@extends('layouts.admin')

@section('title', 'Data Mekanik')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="font-weight-bold">
                <i class="fas fa-user-cog text-primary"></i>
                Data Mekanik
            </h2>

            <p class="text-muted mb-0">
                Kelola seluruh data mekanik bengkel
            </p>

        </div>

        <a href="{{ route('mekanik.create') }}" class="btn btn-primary shadow">

            <i class="fas fa-plus-circle"></i>

            Tambah Mekanik

        </a>

    </div>

    {{-- Search --}}

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form action="{{ route('mekanik.index') }}" method="GET">

                <div class="row">

                    <div class="col-md-10">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari nama atau email mekanik..."
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

    {{-- Table --}}

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">

                Daftar Mekanik

            </h5>

        </div>

        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0">

                <thead class="bg-primary text-white">

                    <tr>

                        <th width="60">No</th>

                        <th>Nama</th>

                        <th>Email</th>

                        <th>No HP</th>

                        <th>Spesialisasi</th>

                        <th width="150">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($mekaniks as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->user->name }}</td>

                        <td>{{ $item->user->email }}</td>

                        <td>{{ $item->no_hp }}</td>

                        <td>{{ $item->spesialisasi }}</td>

                        <td>

                            <a href="{{ route('mekanik.edit',$item->id) }}"
                                class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form
                                action="{{ route('mekanik.destroy',$item->id) }}"
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

                        <td colspan="6" class="text-center">

                            Belum ada data mekanik.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">

            {{ $mekaniks->links() }}

        </div>

    </div>

</div>

@endsection