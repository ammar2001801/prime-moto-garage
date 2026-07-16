@extends('layouts.auth')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-body p-5">

                <div class="text-center mb-4">

                    <i class="fas fa-motorcycle fa-4x text-primary"></i>

                    <h2 class="mt-3 fw-bold">

                        Prime Moto Garage

                    </h2>

                    <p class="text-muted">

                        Professional Motorcycle Service

                    </p>

                </div>

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Masukkan Email"
                            required>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">

                            Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan Password"
                            required>

                    </div>

                    <button class="btn btn-primary w-100">

                        <i class="fas fa-sign-in-alt"></i>

                        Login

                    </button>

                </form>

                <div class="text-center mt-4">

                    Belum punya akun?

                    <a href="{{ route('register') }}">

                        Daftar Disini

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection