@extends('dashboard.layouts.main')

@section('title', 'Ban-User')

@section('container')
    <h2>Are you sure to banned user {{ $user->username }} ?</h2>
    <div class="mt-3">
        <a href="/banned-user/{{ $user->slug }}" class="btn btn-primary">Yes</a>
        <a href="/users" class="btn btn-danger">No</a>
    </div>
@endsection
