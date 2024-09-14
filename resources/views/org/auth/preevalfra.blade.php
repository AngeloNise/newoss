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
    <a href="{{ url('/Annex-A') }}" class="button">Fund Raising Activity</a>
    <a href="{{ url('/Annex-B') }}" class="button">In-Campus Activity</a>
    <a href="{{ url('/Annex-C') }}" class="button">Off-Campus Activity</a>
</div>
@endsection