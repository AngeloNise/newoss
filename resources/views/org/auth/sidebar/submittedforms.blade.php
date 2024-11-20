@extends('layout.orglayout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/preeval.css') }}">

@if(Session::has('success'))
    <script>
        window.flashMessage = {
            message: "{{ Session::get('success') }}",
            type: "success"
        };
    </script>
@endif

<div class="content-container">
    <h1>Submitted Forms</h1>
    <div class="activity-question">
        <p>What type of Activity?</p>
    </div>

    <div class="activity-buttons">
        <!-- Check if a Fund Raising application exists and isn't returned or submitted, or if the user has a pending AnnexA application -->
        <a href="{{ url('/Fund-Raising-SF') }}" class="button">Fund Raising Activity</a>
        <a href="{{ url('/Off-Campus-Activity-SF') }}" class="button">Off-Campus Activity</a>
    </div>

    <div class="note">
        <p>Note: Pre-Evaluation does not guarantee an approved Application. It helps checking all the requirements needed to have an approved activity.</p>
    </div>
</div>

@endsection
