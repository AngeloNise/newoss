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
    <a href="{{ url('/Annex-A') }}" class="button">Annex-A</a>
    <h1>Post-Activity Forms</h1>
    <a href="{{ url('/Annex-B') }}" class="button">Annex-B</a>
    <a href="{{ url('/Annex-C') }}" class="button">Annex-C</a>
</div>
@endsection