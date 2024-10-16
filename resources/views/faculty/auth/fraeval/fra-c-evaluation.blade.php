@extends('layout.adminlayout')
@section('content')

<div class="fra-container">
    <a href="http://127.0.0.1:8000/faculty/FRA-Evaluation" class="btn btn-secondary mb-3">Back</a>
    <h2>FRA Evaluation Applications</h2>
    
    @if($applications->isEmpty())
        <p>No applications submitted for evaluation yet.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name of Organization</th>
                    <th>President Name</th>
                    <th>ACKNOWLEDGEMENT RECEIPT FOR EQUIPMENT</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                <tr onclick="window.location='{{ route('faculty.fra-c-evaluation.show', $application->id) }}'" style="cursor:pointer;">
                    <td>{{ $application->name_of_organization ?? 'N/A' }}</td>
                    <td>{{ $application->name ?? 'N/A' }}</td>
                    <td>Submitted</td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    @endif
</div>

@endsection
