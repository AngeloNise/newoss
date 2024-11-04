@extends('layout.orglayout')
@section('content')

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
    <br>
    <h1>Upon-Approval Requirements</h1>
    <a href="{{ url('/Off-Campus/Annex-D') }}" class="button">Annex D-H</a>
</div>
@endsection
