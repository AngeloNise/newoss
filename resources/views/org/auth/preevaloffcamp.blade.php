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
    <h1>Pre-Activity Form</h1>
    <a href="{{ url('/Off-Campus/Annex-A') }}" class="button">Annex-A</a>
    <a href="{{ url('/Off-Campus/Annex-B') }}" class="button">Annex-B</a>
    <a href="{{ url('/Off-Campus/Annex-C') }}" class="button">Annex-C</a>
    <a href="{{ url('/Off-Campus/Annex-D') }}" class="button">Annex-D</a>
    <a href="{{ url('/Off-Campus/Annex-E') }}" class="button">Annex-E</a>
    <a href="{{ url('/Off-Campus/Annex-F') }}" class="button">Annex-F</a>
    <a href="{{ url('/Off-Campus/Annex-G') }}" class="button">Annex-G</a>
    <a href="{{ url('/Off-Campus/Annex-H') }}" class="button">Annex-H</a>    

    <h1>Post-Activity Forms</h1>
</div>
@endsection
