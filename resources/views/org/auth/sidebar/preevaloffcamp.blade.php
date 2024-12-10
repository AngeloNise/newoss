@extends('layout.orglayout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/ocaeval/ocaeval.css') }}">
@if(Session::has('success'))
    <script>
        window.flashMessage = {
            message: "{{ Session::get('success') }}",
            type: "success"
        };
    </script>
@endif

<div class="annexes">
    <div class="activity-buttons">
        <h1>Pre-Approval Requirements</h1>
        <a href="{{ url('/Off-Campus/Annex-A') }}" class="button">Annex A-C</a>
    </div>
</div>
@endsection
