@extends('dashboard.layouts.main')

@section('title', 'Book List')

@section('container')
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
@endsection
