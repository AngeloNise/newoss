@extends('layout.orglayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/applicationhistorycomment.css')}}">
<div class="comments-container">
    <h2>Comments for {{ $application->name_of_project }}</h2>

    @if($comments->isEmpty())
        <p>No comments found for this application.</p>
    @else
        <ul class="comment-list">
            @foreach($comments->sortByDesc('created_at') as $comment)
                <li>
                    <p>Document: {{ $comment->document }}</p>
                    <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
