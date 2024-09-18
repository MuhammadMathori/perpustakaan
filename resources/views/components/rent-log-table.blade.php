<div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Book</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentLog as $rentLog)
                <tr
                    class="{{ $rentLog->actual_return_date == null ? '' : ($rentLog->return_date < $rentLog->actual_return_date ? 'text-bg-danger' : 'text-bg-success') }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rentLog->user->username }}</td>
                    <td>{{ $rentLog->book->title }}</td>
                    <td>{{ $rentLog->rent_date }}</td>
                    <td>{{ $rentLog->return_date }}</td>
                    <td>{{ $rentLog->actual_return_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
