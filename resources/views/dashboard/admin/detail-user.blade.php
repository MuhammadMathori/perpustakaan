@extends('dashboard.layouts.main')

@section('title', 'Detail User')

@section('container')

    <div class="mt-4">
        <h2>Detail User</h2>

        <form action="create-book" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="uaername" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" readonly
                    value="{{ $user->username }}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" class="form-control" name="phone" id="phone" readonly
                    value="{{ $user->phone }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea type="address" class="form-control" name="address" id="address">{{ $user->address }}
                    </textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" name="status" id="status" readonly
                    value="{{ $user->status }}">
            </div>

            @if ($user->status == 'inactive')
                <a href="/acc-user/{{ $user->slug }}" class="btn btn-primary me-3">Acc User</a>
            @endif

        </form>
    </div>

    <div class="mt-5">
        <h2>List User Rentlog</h2>
        <x-rent-log-table :rentLog="$rentLogs"></x-rent-log-table>
    </div>
@endsection
