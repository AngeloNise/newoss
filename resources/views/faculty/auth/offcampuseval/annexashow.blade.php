@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/offcampuseval/annex-a-view.css') }}">




<div class="application-container">
<a href="{{ url('/faculty/Off-Campus-Evaluation')}}" class="btn back-btn-primary">Back</a>
    <h2>Submission Details</h2>


<div class="org_info">
    <form id="status-update-form" class="mb-4">
        <div class="form-group">
            <label for="status">Update Status</label>
            <select id="status" class="form-control" required>
                <option value="" disabled selected>Select new status</option>
                <option value="Pending Approval">Pending Approval</option>
                <option value="Approved">Approved</option>
                <option value="Returned">Returned</option>
            </select>
            <div class="split">
                <button type="button" class="btn btn-primary">Update Status</button>
                <a href="{{ route('faculty.faculty.offcampus.annex-a.evaluate', ['id' => $submission->id]) }}" class="btn btn-secondary">Evaluate</a>
            </div>
        </div>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <table class="details-table">
        <tbody>
            <tr>
                <td><strong>Name of Activity:</strong> {{ $submission->name_of_activity }}</td>
                <td><strong>Place of Activity:</strong> {{ $submission->place_of_activity }}</td>
                <td><strong>Start Date:</strong> {{ $submission->start_date }}</td>
            </tr>
            <tr>
                <td><strong>End Date:</strong> {{ $submission->end_date }}</td>
                <td><strong>Number of Participants:</strong> {{ $submission->number_of_participants }}</td>
                <td><strong>Campus/College/Organization:</strong> {{ $submission->campus_college_org }}</td>
            </tr>
        </tbody>
    </table>

    <h4>Attachments</h4>
    <table class="attachments-table">
        <tbody>
            @php
                $attachmentLabels = [
                    'Letter of Intent',
                    'Invitation/Acceptance Letter',
                    'Endorsement Letter',
                    'Program of Activities',
                    'Summary List of Participants',
                    'Latest Certificate of Registration',
                    'Curriculum Copy (For Curricular Activities)'
                ];
            @endphp

            @for ($i = 1; $i <= 7; $i++)
                @php 
                    $attachment = "attachment{$i}_path"; 
                @endphp
                <tr>
                    <td>
                        <strong>{{ $attachmentLabels[$i - 1] }}:</strong> 
                        @if ($submission->$attachment)
                        <a href="{{ route('faculty.preApproval.download', ['id' => $submission->id, 'attachmentNumber' => $i]) }}" target="_blank">View File</a>
                        @else
                            Not provided
                        @endif
                    </td>
                </tr>
            @endfor

        </tbody>
    </table>



@endsection
