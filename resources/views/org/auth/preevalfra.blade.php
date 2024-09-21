@extends('layout.orglayout')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="annexes">
    <h1>Fill-up the Forms below</h1>
    <a href="{{ url('/Annex-A') }}" class="button">Annex-A</a>
    <a href="{{ url('/Annex-B') }}" class="button">Annex-B</a>
    <a href="{{ url('/Annex-C') }}" class="button">Annex-C</a>
</div>
@endsection