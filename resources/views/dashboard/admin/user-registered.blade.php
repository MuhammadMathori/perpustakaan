@extends('dashboard.layouts.main')

@section('title', 'Users Registered')

@section('container')
    <div class="mt-4">
        <h2>New Register User</h2>
        <div class="mt-4 d-flex justify-content-end">
            <a href="users" class="btn btn-info me-3">Acc User</a>
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
                    @foreach ($usersRegistered as $user)
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
