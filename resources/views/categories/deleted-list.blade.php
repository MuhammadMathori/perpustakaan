@extends('dashboard.layouts.main')

@section('title', 'List Deleted Category')

@section('container')
    <div class="mt-4">
        <h2>List Deleted Categories</h2>

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
                    @foreach ($deletedCategories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="/restore-category/{{ $category->slug }}" class="btn btn-secondary">Restore</a>
                                {{-- <a href="/delete-category/{{ $category->slug }}" class="btn btn-danger">Delete</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="container justify-content-center text-center">
                data is emty
            </div> --}}
            <div class="mt-4 d-flex justify-content-end">
                <a href="categories" class="btn btn-primary me-3">Back</a>
            </div>
        </div>
    </div>
@endsection
