@extends('layout.adminlayout')
@section('content')

<div class="fra-container">
    <h2>FRA Evaluation Applications</h2>

    @if($applications->isEmpty())
        <p>No applications submitted for evaluation yet.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Estimated Income</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                <tr onclick="window.location='{{ route('faculty.fra-evaluation.show', $application->id) }}'" style="cursor:pointer;">
                    <td>{{ $application->name_of_project }}</td>
                    <td>{{ $application->requesting_organization }}</td>
                    <td>{{ $application->start_date }}</td>
                    <td>{{ $application->end_date }}</td>
                    <td>{{ $application->total_estimated_income }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    @endif
</div>

@endsection