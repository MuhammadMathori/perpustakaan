@extends('dashboard.layouts.main')

@section('title', 'Users')

@section('container')
    <div class="mt-4">
        <h2>User List</h2>
        <div class="mt-4 d-flex justify-content-end">
            <a href="user-registered" class="btn btn-info me-3">New Register User</a>
            <a href="destroy-user" class="btn btn-secondary">View User Banned</a>
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
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
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
                                <a href="detail-user/{{ $user->slug }}" class="btn btn-primary">Detail</a>
                                <a href="ban-user/{{ $user->slug }}" class="btn btn-danger">Banned</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
