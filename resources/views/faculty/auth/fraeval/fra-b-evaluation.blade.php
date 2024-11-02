@extends('layout.adminlayout')
@section('content')

<div class="fra-container">
    <a href="{{ url('/faculty/Pre-Evaluation-Status') }}" class="btn btn-secondary mb-3">Back</a>
    <h2>FRA Evaluation Applications</h2>
    

    @if($applications->isEmpty())
        <p>No applications submitted for evaluation yet.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name of Organization</th>
                    <th>Semester</th>
                    <th>School Year</th>
                    <th>Period Covered</th>
                    <th>Total Cash Available</th>
                    <th>Ending Cash Balance</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                <tr onclick="window.location='{{ route('faculty.fra-b-evaluation.show', $application->id) }}'" style="cursor:pointer;">
                    <td>{{ $application->name_of_org }}</td>
                    <td>{{ $application->semester }}</td>
                    <td>{{ $application->school_year }}</td>
                    <td>{{ $application->period_covered }}</td>
                    <td>{{ $application->cash_available }}</td>
                    <td>{{ $application->ending_cash_balance }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    @endif
</div>

@endsection
