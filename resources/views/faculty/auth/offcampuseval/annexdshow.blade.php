@extends('layout.adminlayout')

@section('content')
<div class="application-container">
    <h2>Submission Details</h2>
    
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
                    'Individual Itinerary of Travel',
                    'Scanned copy/photocopy of the Passport',
                    'Medical Clearance',
                    'Endorsement letter to Medical and Dental',
                    'First Aid Kit',
                    'Group insurance',
                    'Consent Form'
                    'Assumption of Responsibility'
                    'Request letter to show proof'
                    'Risk Assessment Plan'
                    'Consultation conducted'
                    'Fees/ und'
                    'Procurement Requirements'
                    'Complied Student Requirements'
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
                        <a href="{{ route('faculty.AnnexD.download', ['id' => $submission->id, 'attachmentNumber' => $i]) }}" target="_blank">View File</a>
                        @else
                            Not provided
                        @endif
                    </td>
                </tr>
            @endfor

        </tbody>
    </table>

    <div class="activity-buttons">
        <a href="{{ route('faculty.offcampus.annex.a.index') }}" class="btn btn-secondary">Back to Submissions</a>
    </div>
</div>

<link rel="stylesheet" href="/css/faculty/offcampuseval/annex-a-view.css">
@endsection
