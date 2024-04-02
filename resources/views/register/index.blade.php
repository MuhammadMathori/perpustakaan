@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <main class="form-registation">
                <h1 class="h3 mb-3 fw-normal text-center">Registation</h1>
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror"
                            id="username" placeholder="Username" value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
                            placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="phone" name="phone" class="form-control rounded-top" id="phone"
                            placeholder="phone">
                        <label for="phone">Phone</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control @error('address') is-invalid @enderror " name="address" id="address"
                            placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="address">Address</label>
                        <div class="invalid-feedback">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-2">Alredy register <a href="/login ">Login</a></small>
            </main>
        </div>
    </div>
@endsection
