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

@php
    $user = auth()->user();
    
    // Check if there is an existing Fund Raising application with status other than 'Returned' 
    // and 'frapost' is not 'submitted'
    $existingFundRaisingApplication = \App\Models\Application::where('name_of_organization', $user->name_of_organization)
        ->where('proposed_activity', 'Fund Raising')
        ->where(function($query) {
            $query->where('status', '!=', 'Returned') // Exclude 'Returned' status
                  ->where('frapost', '!=', 'submitted'); // Exclude if 'frapost' is 'submitted'
        })
        ->exists();
        
    // Check if there is an existing pending application for AnnexA
    $existingApplication = \App\Models\AnnexA::where('email', $user->email)
        ->where('status', 'Pending Approval')
        ->exists();
@endphp

<div class="content-container">
    <div class="history-button">
        <a href="{{ url('/Submitted-Forms') }}" class="btnhistory"> Pre-Evaluation History</a>
    </div>
    <h1>Pre-Evaluation</h1>
    <div class="activity-question">
        <p>What type of Activity?</p>
    </div>

    <div class="activity-buttons">
        <!-- Check if a Fund Raising application exists and isn't returned or submitted, or if the user has a pending AnnexA application -->
        <a href="{{ url('/FRA/Annex-A') }}" class="button {{ $existingFundRaisingApplication || $existingApplication ? 'disabled' : '' }}" 
           {{ $existingFundRaisingApplication || $existingApplication ? 'onclick="return false;"' : '' }}>
           {{ $existingFundRaisingApplication || $existingApplication ? 'Fund Raising Activity (One FRA Application at a time)' : 'Fund Raising Activity' }}
        </a>
        <a href="{{ url('/Off-Campus-Activity') }}" class="button">Off-Campus Activity</a>
    </div>

    <div class="note">
        <p>Note: Pre-Evaluation does not guarantee an approved Application. It helps checking all the requirements needed to have an approved activity.</p>
    </div>
</div>

@endsection
