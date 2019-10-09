@extends('layouts.pdf')

<h1>Borrowed books report</h1>
<p>From: {{  \Carbon\Carbon::parse($start_date)->format('j F Y') }} to {{  \Carbon\Carbon::parse($end_date)->format('j F Y') }}</p>
<p>Status: {{ $status }}</p>
<br>
<table class="table">
    <thead>
        <tr>
            <th>Book</th>
            <th>Member</th>
            <th>Borrowed at</th>
            <th>Status</th>
            <th>Return due date</th>
            <th>Returned at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrowed_books as $borrowed)
        <tr>
            <td>{{ $borrowed->book->name }}</td>
            <td>{{ $borrowed->member->name }}</td>
            <td>{{ \Carbon\Carbon::parse($borrowed->time)->format('j F Y') }}</td>
            <td>{{ $borrowed->status }}</td>
            <td>{{ \Carbon\Carbon::parse($borrowed->due_date)->format('j F Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($borrowed->returned)->format('j F Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>