@extends('dashboard.layouts.main')

@section('title', 'Delete-Categories')

@section('container')
    <h2>Are you sure to delete category {{ $category->name }} ?</h2>
    <div class="mt-3">
        <a href="/destroy-category/{{ $category->slug }}" class="btn btn-primary">Yes</a>
        <a href="/categories" class="btn btn-danger">No</a>
    </div>
@endsection
