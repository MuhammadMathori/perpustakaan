@extends('dashboard.layouts.main')

@section('title', 'Create Book')

@section('container')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <div class="mt-4">
        <h2>Create new book</h2>

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

            <form action="create-book" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="code" class="form-label">Book Code</label>
                    <input type="text" class="form-control" name="book_code" id="book_code"
                        value="{{ old('book_code') }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Book Name</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Cover</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Category</label>
                    <select name="categories[]" id="categories" class="form-control select-mutiple" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-mutiple').select2();
        });
    </script>
@endsection
