@extends('layout.adminlayout')
@section('content')

<div class="content-container">
    <h1>Annexes</h1>
    <div class="activity-question">
        <p>Pre-Activity-Evaluation</p>
    </div>

    <div class="activity-buttons">
        <a href="{{ url('/faculty/FRA-A-Evaluation') }}" class="button">Annex-A</a>
    </div>

    <div class="activity-question">
        <p>Post-Activity-Evaluation</p>
    </div>

    <div class="activity-buttons">
        <a href="{{ url('/faculty/FRA-B-Evaluation') }}" class="button">Annex-B</a>
    </div>

    <div class="activity-buttons">
        <a href="{{ url('/faculty/FRA-C-Evaluation') }}" class="button">Annex-C</a>
    </div>
    
</div>

@endsection