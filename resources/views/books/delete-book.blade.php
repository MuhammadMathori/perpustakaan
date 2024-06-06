@extends('dashboard.layouts.main')

@section('title', 'Delete-Book')

@section('container')
    <h2>Are you sure to delete book {{ $book->title }} ?</h2>
    <div class="mt-3">
        <a href="/destroy-book/{{ $book->slug }}" class="btn btn-primary">Yes</a>
        <a href="/books" class="btn btn-danger">No</a>
    </div>
@endsection
