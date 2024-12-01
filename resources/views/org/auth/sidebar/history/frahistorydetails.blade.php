@extends('layout.orglayout') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/applicationhistorycomment.css') }}">

<div class="comments-container">
    <h2>Comments for {{ $application->name_of_project }}</h2>
    
    <!-- Added the table element here -->
    <table>
        <thead>
            <tr>
                <th>Document</th>
                <th>Comment</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($application->logs as $log)
                @php
                    $document = json_decode($log->document, true);
                    $comment = json_decode($log->comment, true);
                @endphp

                @if ($document || $comment) <!-- Only show if document or comment exist -->
                    <tr>
                        <td>{{ $document['new'] ?? 'N/A' }}</td>
                        <td>{{ $comment['new'] ?? 'N/A' }}</td>
                        <td>{{ $log->updated_at->format('F j, Y, g:i a') }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
