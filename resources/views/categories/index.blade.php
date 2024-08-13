@extends('dashboard.layouts.main')

@section('title', 'Categories')

@section('container')

    <div class="mt-4">
        <h2>Categories List</h2>
        <div class="mt-4 d-flex justify-content-end">
            <a href="create-category" class="btn btn-primary me-3">Create New Category</a>
            <a href="deleted-category" class="btn btn-info">View Category Delete</a>
        </div>
        <div class="mt-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="mt-4">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="/edit-category/{{ $category->slug }}" class="btn btn-warning">Edit</a>
                                <a href="/delete-category/{{ $category->slug }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
