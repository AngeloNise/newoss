@extends('layout.adminlayout')
@section('content')
<div class="content-container">
    <h1>Evaluation Form</h1>
    <div class="activity-question">
        <p>What type of Activity?</p>
    </div>
    <div class="activity-buttons">
        <a href="{{ url('/faculty/FRA-Evaluation') }}" class="button">Fund Raising Activity</a>
        <a href="{{ url('/faculty/In-Campus-Evaluation') }}" class="button">In-Campus Activity</a>
        <a href="{{ url('/faculty/Off-Campus-Evaluation') }}" class="button">Off-Campus Activity</a>
    </div>
</div>
@endsection
