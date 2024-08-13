@extends('dashboard.layouts.main')

@section('title', 'Book Rent')

@section('container')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <form action="bookRent" method="POST">
        @csrf
        <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3 mt-5">

            <div class="mt-4">
                @if (session('status'))
                    <div class="alert {{ session('alert') }}">
                        {{ session('status') }}
                    </div>
                @endif

                <h3 class="mb-4 text-center">Book Rent Form</h3>
                <div class="mb-3">
                    <select class="form-select userBox" aria-label="Default select example" name="user_id" id="user">
                        <option selected>Open this select user</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-select bookBox" aria-label="Default select example" name="book_id" id="book">
                        <option selected>Open this select book</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-100">
                        Submit
                    </button>
                </div>
            </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.userBox').select2();
            $('.bookBox').select2();
        });
    </script>
@endsection
