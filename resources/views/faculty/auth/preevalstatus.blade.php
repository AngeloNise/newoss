@extends('layout.adminlayout')

@section('content')
<table>
    <tr>
        <th>Webmail</th>
        <th>Name</th>
        <th>Date Submitted</th>
        <th>Evaluation Type</th>
        <th>Documents</th>
        <th>Status</th>
        <th>Action</th> <!-- Add a column for the action link -->
    </tr>

    @foreach($data as $item)
    <tr>
        <td>{{ $item->user_email }}</td>
        <td>{{ $item->name_of_organization }}</td>
        <td>{{ $item->date_issued }}</td>
        <td>{{ $item->pre_eval_type }}</td>
        <td>{{ $item->documents }}</td>
        <td>{{ $item->status }}</td>
        <td>
            <a href="{{ route('preevalstatus.show', ['id' => $item->id]) }}">View Details</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
