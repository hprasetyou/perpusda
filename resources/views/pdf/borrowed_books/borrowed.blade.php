<h1>Borrowed books report</h1>
<table>
<thead>
<tr>
    <th>Book</th>
    <th>Member</th>
    <th>Date</th>
    <th>Status</th>
</tr>
</thead>
<tbody>
@foreach ($borrowed_books as $borrowed)
    <tr>
        <td>{{ $borrowed->book->name }}</td>
        <td>{{ $borrowed->member->name }}</td>
        <td></td>
        <td>{{ $borrowed->status }}</td>
    </tr>
@endforeach
</tbody>
</table>