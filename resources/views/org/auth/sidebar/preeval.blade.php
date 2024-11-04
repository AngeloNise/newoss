@extends('layout.orglayout')
@section('content')
    <link rel="stylesheet" href="/css/orgs/preeval.css">
@if(Session::has('success'))
    <script>
        window.flashMessage = {
            message: "{{ Session::get('success') }}",
            type: "success"
        };
    </script>
@endif
<div class="content-container">
    <h1>Pre-Evaluation</h1>
    <div class="activity-question">
        <p>What type of Activity?</p>
    </div>
      
    <div class="activity-buttons">
        <a href="{{ url('/FRA/Annex-A') }}" class="button">Fund Raising Activity</a>
        <a href="{{ url('/Off-Campus-Activity') }}" class="button">Off-Campus Activity</a>
    </div>
    <div class="note">
        <p>Note: Pre-Evaluation does not guarantee an approved Application. It helps checking all the requirements needed to have an approved activity.</p>
    </div>
</div>
@endsection
