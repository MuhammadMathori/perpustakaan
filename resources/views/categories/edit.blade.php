@extends('dashboard.layouts.main')

@section('title', 'Edit Category')

@section('container')
    <div class="mt-4">
        <h2>Edit category</h2>
        <div class="mt-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/edit-category/{{ $category->slug }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Category</label>
                    <input type="text" class="form-control" value="{{ $category->name }}" name="name" id="name">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
