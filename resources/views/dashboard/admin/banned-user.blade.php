@extends('dashboard.layouts.main')

@section('title', 'List Banned User')

@section('container')
    <div class="mt-4">
        <h2>List Banned User</h2>

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
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bannedUser as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                @if ($user->phone)
                                    {{ $user->phone }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <a href="/unban-user/{{ $user->slug }}" class="btn btn-secondary">Unbenned</a>
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
                <a href="users" class="btn btn-primary me-3">Back</a>
            </div>
        </div>
    </div>
@endsection
