@extends('layout.orglayout')

@section('content')
    <link rel="stylesheet" href="/css/orgs/pdf/evalpdf.css">
    <div class="fra-container mt-4">
        <h2>Your Submitted Forms</h2>

        @if($applications->isEmpty())
            <p>No forms submitted yet.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name of Project</th>
                        <th>Requesting Organization</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Estimated Income</th>
                        <th>Status</th>
                        <th></th>
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
                            <td>{{ $application->status }}</td>
                            <td>
                                <div class="split">
                                    <button onclick="window.location='{{ route('org.fra-a-evaluation.show', $application->id) }}'" class="btn btn-primary">
                                        View
                                    </button>
                                    @if($application->status === 'Approved')
                                        <a href="{{ route('generate-pdf', ['id' => $application->id]) }}" class="btn btn-secondary" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 5px;">
                                                <path d="M12 3v9m0 0l3-3m-3 3l-3-3M4 21h16" />
                                            </svg>
                                            PDF
                                        </a>
                                    @else
                                        <div class="border p-2 text-muted" style="border-radius: 5px;">
                                            PDF will be available once approved
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
