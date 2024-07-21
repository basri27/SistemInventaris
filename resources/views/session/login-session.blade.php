@extends('layouts.user_type.guest')
@section('title', 'Login - Sistem Inventaris | PT. SCCI')
@section('content')
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-shadow mt-6">
                                <div class="card-header text-center pb-0 bg-transparent">
                                    <img class="mb-3" src="{{ asset('assets/img/sm-logo-scci.png') }}" alt="">
                                    <h3 class="font-weight-bolder text-warning text-gradient">Login<br>Sistem Inventaris
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('login-action') }}">
                                        @csrf
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Email"
                                                @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @else
                                                value="{{ old('email') }} @endif"
                                                aria-label="Email" aria-describedby="email-addon" required>
                                            @error('email')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="Password"
                                                @if (isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @endif
                                                aria-label="Password" aria-describedby="password-addon" required>
                                            @error('password')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                checked>
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn bg-gradient-warning w-100 mt-4 mb-0">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <small class="text-muted">Forgot you password? Reset you password
                                        <a href="/login/forgot-password"
                                            class="text-info text-gradient font-weight-bold">here</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div
                                    class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6 bg-gradient-warning">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
