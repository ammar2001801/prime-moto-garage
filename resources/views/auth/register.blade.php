@extends('layouts.auth')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-6">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-body p-5">

                <div class="text-center mb-4">

                    <div class="logo mb-3">
                        <i class="fas fa-car fa-3x text-primary"></i>
                    </div>

                    <h2 class="fw-bold">
                        Bengkel Maju Motor
                    </h2>

                    <p class="text-muted">
                        Daftar Akun Baru
                    </p>

                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            required
                            autofocus>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Konfirmasi Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required>
                    </div>

                    <button class="btn btn-primary w-100">
                        <i class="fas fa-user-plus"></i>
                        Daftar
                    </button>

                </form>

                <div class="text-center mt-4">

                    Sudah punya akun?

                    <a href="{{ route('login') }}">
                        Login Disini
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection