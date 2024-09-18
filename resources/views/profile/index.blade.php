@extends('dashboard.layouts.main')

@section('title', 'Profile')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->username }}</h1>
    </div>

    <div class="mt-5">
        <h4 class="mb-3">List Your Rent Logs</h4>
        <x-rent-log-table :rentLog="$rentLogs"></x-rent-log-table>
    </div>
@endsection
