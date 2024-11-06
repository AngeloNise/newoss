@extends('layout.adminlayout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/preevalforms.css') }}">

<div class="content-container">
    <h1>Post Activity Report</h1>
    <div class="activity-question">
        <p>What type of Activity?</p>
    </div>
    <div class="activity-buttons">
        <a href="{{ url('/faculty/Post-Activity-FRA') }}" class="button">Fund Raising Activity</a>
        <a href="{{ url('/faculty/Off-Campus-PostActivity') }}" class="button">Off-Campus Activity</a>
    </div>
</div>
@endsection
