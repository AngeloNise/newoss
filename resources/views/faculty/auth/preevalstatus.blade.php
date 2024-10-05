@extends('layout.adminlayout')
@section('content')
<div class="content-container">
    <h1>Evaluation Form</h1>
    <div class="activity-question">
        <p>What type of Activity?</p>
    </div>
    <div class="activity-buttons">
        <a href="{{ url('/Fund-Raising-Forms') }}" class="button">Fund Raising Activity</a>
        <a href="{{ url('/In-Campus-Forms') }}" class="button">In-Campus Activity</a>
        <a href="{{ url('/Off-Campus-Forms') }}" class="button">Off-Campus Activity</a>
    </div>
</div>
@endsection
