@extends('layouts.main')

@section('container')
    <div class="warapper">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form action="/register" method="POST">
            @csrf
            <h1>Register</h1>
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
            <div class="input-box">
                <input type="text" name="phone" id="phone" placeholder="Your phone"
                    @error('phone') is-invalid @enderror required>
                <label for="phone"></label>
                <i class="bi bi-telephone-fill"></i>
            </div>
            <div class="input-box">
                <textarea name="address" id="address" placeholder="Your Address" id="floatingTextarea2" style="height: 70px"
                    @error('address') is-invalid @enderror required></textarea>
                <label for="address"></label>
                <div class="invalid-feedback">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn">Register</button>
            <div class="register-link">
                <p>Already created an account. <a href="/login">Login</a></p>
            </div>
        </form>
    </div>
@endsection
