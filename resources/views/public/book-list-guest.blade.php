@extends('layouts.main')
<nav class="navbar navbar-expand-lg bg-info">
    <div class="container">
        <a class="navbar-brand" href="#">Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link text-secondary" aria-current="page" href="login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <div class="row">
        @foreach ($books as $book)
            <div class="col-lg-3 col-md-4 com-sm-6 col-mb-3 mt-3">
                <div class="card h-100">
                    <img src="{{ $book->cover != null ? asset('storage/cover/' . $book->cover) : asset('img/book not found.jpg') }}"
                        class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->book_code }}</h5>
                        <p class="card-text">{{ $book->title }}</p>
                        <p
                            class="card-text text-end fw-bold {{ $book->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                            {{ $book->status }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
