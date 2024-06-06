@extends('dashboard.layouts.main')

@section('title', 'List Deleted Book')

@section('container')
    <div class="mt-4">
        <h2>List Deleted Books</h2>

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
                        <th>Code</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deletedBooks as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->book_code }}</td>
                            <td>{{ $book->title }}</td>
                            <td>
                                @foreach ($book->categories as $category)
                                    {{ $category->name }} <br>
                                @endforeach
                            </td>
                            <td>
                                <a href="/restore-book/{{ $book->slug }}" class="btn btn-secondary">Restore</a>
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
                <a href="books" class="btn btn-primary me-3">Back</a>
            </div>
        </div>
    </div>
@endsection
