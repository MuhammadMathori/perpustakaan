@extends('dashboard.layouts.main')

@section('title', 'Rent Log')

@section('container')
    <div class="mt-4">
        <h2>Rent Logs List</h2>

        <div class="mt-5">
            <x-rent-log-table :rentLog="$rentLogs"></x-rent-log-table>
        </div>
    </div>
@endsection
