@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/createevent.css') }}">
<div class="createevents-container">
    <h1 class="header-incampus">Create Event</h1>

    <!-- Display Success or Error Messages -->
    @if(session('success'))
        <div class="alertincampus_incampus alertsuccessincampus_incampus">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alertincampus_incampus alerterrorincampus_incampus">
            {{ session('error') }}
        </div>
    @endif

    <!-- Validation error messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('faculty.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="label">Event Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description" class="label">Event Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>

        <div class="form-group">
            <label for="image" class="label">Event Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png, .gif, .bmp" required>
            <small class="form-text text-muted">Max: 7168 kb | 7 mb</small>
        </div>

        <div class="form-group">
            <label for="href" class="label">Event Facebook Link</label>
            <input type="url" class="form-control" id="href" name="href" required>
        </div>

        <div class="form-group">
            <label for="eligible" class="label">Eligible to attend for...</label>
            <input type="text" class="form-control" id="eligible" name="eligible" placeholder="Ex: Everyone, COC, CCIS" required>
        </div>

        <div class="form-group">
            <label for="event_date" class="label">Event Date and Time</label>
            <input type="datetime-local" class="form-control" id="event_date" name="event_date" required>
        </div>

        <button type="submit" class="btn-primary" id="submitBtn">Save Event</button>
    </form>
</div>
@endsection
