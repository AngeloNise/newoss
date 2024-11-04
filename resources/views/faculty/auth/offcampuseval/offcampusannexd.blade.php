@extends('layout.adminlayout')

@section('content')
<div class="application-detail-container">
    <h2>All Submissions</h2>

    @if($submissions->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name of Activity</th>
                    <th>Place of Activity</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Participants</th>
                    <th>Campus/College/Org</th>
                    <th>Attached Files</th>
                </tr>
            </thead>
            <tbody>
                @foreach($submissions as $submission)
                <tr>
                    <td>{{ $submission->id }}</td>
                    <td>{{ $submission->name_of_activity }}</td>
                    <td>{{ $submission->place_of_activity }}</td>
                    <td>{{ $submission->start_date }}</td>
                    <td>{{ $submission->end_date }}</td>
                    <td>{{ $submission->number_of_participants }}</td>
                    <td>{{ $submission->campus_college_org }}</td>
                    <td>
                        <a href="{{ route('faculty.offcampus.annex.d.show', $submission->id) }}" class="btn btn-primary">View Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No submissions found.</p>
    @endif
</div>

<script>
    function previewAttachment(filePath, label) {
        // Check if the file is a PDF
        if (!filePath.endsWith('.pdf')) {
            alert('The file "' + label + '" is not a PDF and cannot be previewed.');
            return;
        }

        // If it is a PDF, open it in a new tab
        window.open('{{ url('/') }}/' + filePath, '_blank');
    }
</script>

<link rel="stylesheet" href="/css/faculty/offcampuseval/annex-a.css">
@endsection
