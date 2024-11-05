@extends('layout.adminlayout')
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

<div class="annexes">
    <h1>Pre-Approval Requirements</h1>
    <a href="{{ url('/faculty/Off-Campus-Evaluation') }}" class="button">Annex A-C</a>
    <h1>Upon-ApprovalL Requirements</h1>
    <a href="{{ url('/Off-Campus/Annex-D') }}" class="button">Annex D-H</a>
</div>
@endsection
