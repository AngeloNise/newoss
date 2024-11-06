@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/postact.css') }}">


<div class="content-container">
    <h1>Post Activity Report/Untagging</h1>
    <table>
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($approvedApplications as $application)
            <tr>
                <td>{{ $application->name_of_organization }}</td>
                <td>
                    <span style="color: green;">Approved</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
