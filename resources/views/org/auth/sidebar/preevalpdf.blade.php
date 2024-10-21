@extends('layout.orglayout')

@section('content')
    <div class="container mt-4">
        <h2>Your Submitted Forms</h2>

        @if($applications->isEmpty())
            <p>No forms submitted yet.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>            </th>
                        <th>Name of Project</th>
                        <th>Requesting Organization</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Estimated Income</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                        <tr>
                            <td>{{ $loop->iteration }}).</td>
                            <td>{{ $application->name_of_project }}</td>
                            <td>{{ $application->requesting_organization }}</td>
                            <td>{{ $application->start_date }}</td>
                            <td>{{ $application->end_date }}</td>
                            <td>{{ $application->total_estimated_income }}</td>
                            <td>
                                <a href="#" class="btn btn-primary">View</a>
                                <a href="{{ route('generate-pdf', ['id' => $application->id]) }}" class="btn btn-secondary">Download PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
