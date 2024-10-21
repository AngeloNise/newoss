@extends('layout.orglayout')

@section('content')

<div class="container">
    <h2>Off-Campus Activity History</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date Issued</th>
                <th>Proposed Activity</th>
                <th>Location</th>
                <th>Document</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offcampusHistory as $activity)
                <tr>
                    <td>{{ $activity->date_issued }}</td>
                    <td>{{ $activity->proposed_activity }}</td>
                    <td>{{ $activity->location }}</td>
                    <td><a href="{{ asset('storage/' . $activity->document) }}">{{ basename($activity->document) }}</a></td>
                    <td>{{ $activity->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
