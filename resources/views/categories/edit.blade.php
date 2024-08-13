@extends('dashboard.layouts.main')

@section('title', 'Create Category')

@section('container')
    <div class="mt-4">
        <h2>Edit Category</h2>

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
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Category</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
