@extends('layouts.main')

@section('container')
    <div class="col-md-5">
        <div class="warapper">
            @if (session('status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="username" id="username" placeholder="Your Username"
                        @error('username') is-invalid @enderror required>
                    <label for="username"></label>
                    <i class="bi bi-person-circle"></i>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Your  Password" required>
                    <label for="password"></label>
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="register-link">
                    <p>Don't have an account? <a href="/register">Register Now</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
