@extends('layout.orglayout')

@section('content')

<div class="container">
    <h2>Fund Raising History</h2>

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
            @foreach ($fundRaisingHistory as $application)
                <tr>
                    <td>{{ $application->date_issued }}</td>
                    <td>{{ $application->proposed_activity }}</td>
                    <td>{{ $application->location }}</td>
                    <td><a href="{{ asset('storage/' . $application->document) }}">{{ basename($application->document) }}</a></td>
                    <td>{{ $application->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
