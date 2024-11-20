@extends('layout.orglayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/pdf/evalpdf.css') }}">
<div class="fra-container mt-4">
    <h2>Your Submitted Forms</h2>
    <br><br>
{{-- Off-Campus Applications --}}
          <h3>Off-Campus Applications</h3>

        @if($offCampusApplications->isEmpty())
              <p>No Off-Campus applications found.</p>
        @else
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Name of Activity</th>
                          <th>Place of Activity</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Number of Participants</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($offCampusApplications as $submission)
                          <tr>
                              <td>{{ $loop->iteration }}.</td>
                              <td>{{ $submission->name_of_activity }}</td>
                              <td>{{ $submission->place_of_activity }}</td>
                              <td>{{ $submission->start_date }}</td>
                              <td>{{ $submission->end_date }}</td>
                              <td>{{ $submission->number_of_participants }}</td>
                              <td>
                                  <button onclick="window.location='{{ route('offcampus.annex.a.show', $submission->id) }}'" class="btn btn-primary">View</button>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          @endif
      </div>
      @endsection
      