@extends('layout.orglayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/pdf/evalpdf.css') }}">
    <div class="fra-container mt-4">
        <h2>Your Submitted Forms</h2>

        {{-- Ongoing Applications (Pending Approval) --}}
        <h3>Ongoing Applications (Pending Approval)</h3>
        @php
            $pendingApplications = $applications->filter(function ($application) {
                return $application->status === 'Pending Approval';
            });
        @endphp

        @if($pendingApplications->isEmpty())
            <p>No ongoing applications.</p>
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
                    @foreach($pendingApplications as $application)
                        <tr>
                            <td>{{ $loop->iteration }}).</td>
                            <td>{{ $application->name_of_project }}</td>
                            <td>{{ $application->requesting_organization }}</td>
                            <td>{{ $application->start_date }}</td>
                            <td>{{ $application->end_date }}</td>
                            <td>{{ $application->total_estimated_income }}</td>
                            <td>{{ $application->status }}</td>
                            <td>
                                <button onclick="window.location='{{ route('org.fra-a-evaluation.show', $application->id) }}'" class="btn btn-primary">View</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- Recently Approved or Returned Application --}}
        <h3>Recently Approved or Returned Application</h3>
        @php
            // Get the most recent application that is either Approved or Returned
            $mostRecentApprovedOrReturned = $applications->filter(function ($application) {
                return in_array($application->status, ['Approved', 'Returned']);
            })->sortByDesc('updated_at')->first(); // Get the most recent one
        @endphp

        @if(!$mostRecentApprovedOrReturned)
            <p>No approved or returned applications.</p>
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
                    <tr>
                        <td>1).</td>
                        <td>{{ $mostRecentApprovedOrReturned->name_of_project }}</td>
                        <td>{{ $mostRecentApprovedOrReturned->requesting_organization }}</td>
                        <td>{{ $mostRecentApprovedOrReturned->start_date }}</td>
                        <td>{{ $mostRecentApprovedOrReturned->end_date }}</td>
                        <td>{{ $mostRecentApprovedOrReturned->total_estimated_income }}</td>
                        <td>{{ $mostRecentApprovedOrReturned->status }}</td>
                        <td>
                            <button onclick="window.location='{{ route('org.fra-a-evaluation.show', $mostRecentApprovedOrReturned->id) }}'" class="btn btn-primary">View</button>
                            @if($mostRecentApprovedOrReturned->status === 'Approved')
                                <a href="{{ route('generate-pdf', ['id' => $mostRecentApprovedOrReturned->id]) }}" class="btn btn-secondary" target="_blank">PDF</a>
                            @else
                                <div class="border p-2 text-muted" style="border-radius: 5px;">
                                    PDF will be available once approved
                                </div>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif

        {{-- All Approved or Returned Applications --}}
        <h3>All Approved or Returned Applications</h3>
        @php
            // Get all applications that are either Approved or Returned, excluding the most recent one
            $allApprovedReturned = $applications->whereIn('status', ['Approved', 'Returned'])
                ->sortByDesc('updated_at');

            // Remove the most recent application from the list
            $recentId = $mostRecentApprovedOrReturned ? $mostRecentApprovedOrReturned->id : null;
            if ($recentId) {
                $allApprovedReturned = $allApprovedReturned->where('id', '!=', $recentId);
            }
        @endphp

        @if($allApprovedReturned->isEmpty())
            <p>No approved or returned applications.</p>
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
                    @foreach($allApprovedReturned as $application)
                        <tr>
                            <td>{{ $loop->iteration }}).</td>
                            <td>{{ $application->name_of_project }}</td>
                            <td>{{ $application->requesting_organization }}</td>
                            <td>{{ $application->start_date }}</td>
                            <td>{{ $application->end_date }}</td>
                            <td>{{ $application->total_estimated_income }}</td>
                            <td>{{ $application->status }}</td>
                            <td>
                                <button onclick="window.location='{{ route('org.fra-a-evaluation.show', $application->id) }}'" class="btn btn-primary">View</button>
                                @if($application->status === 'Approved')
                                    <a href="{{ route('generate-pdf', ['id' => $application->id]) }}" class="btn btn-secondary" target="_blank">PDF</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
