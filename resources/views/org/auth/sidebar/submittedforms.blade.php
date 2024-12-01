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
    <a href="{{ url('/Pre-Evaluation') }}" class="btn btn-primary">Back</a>
    <h1>Submitted Forms</h1>
    <div class="activity-buttons">
        <!-- Check if a Fund Raising application exists and isn't returned or submitted, or if the user has a pending AnnexA application -->
        <a href="{{ url('/Fund-Raising-SF') }}" class="button">Fund Raising Activity</a>
        <a href="{{ url('/Off-Campus-Activity-SF') }}" class="button">Off-Campus Activity</a>
    </div>
</div>

@endsection
