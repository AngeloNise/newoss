@extends('layout.orglayout')

@section('content')
<div class="container_incampus">
    <link rel="stylesheet" href="{{ asset('css/orgs/editevent.css') }}">
    <h1 class="headerincampus_incampus">Edit Event</h1>
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
    <form action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}" method="POST" enctype="multipart/form-data" class="createevent-form" id="createEventForm">
        @csrf

        <!-- For updating, use PUT method -->
        @if(isset($event))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title" class="label">Event Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ isset($event) ? $event->title : old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="description" class="label">Event Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ isset($event) ? $event->description : old('description') }}" required>
        </div>

        <div class="form-group">
            <label for="image" class="label">Event Image (Leave empty if you don't want to change it)</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png, .gif, .bmp">
            <small class="form-text text-muted">Max: 7168kb | 7 mb</small>
        </div>

        <div class="form-group">
            <label for="href" class="label">Event Facebook Link</label>
            <input type="url" class="form-control" id="href" name="href" value="{{ isset($event) ? $event->href : old('href') }}" required>
        </div>

        <div class="form-group">
            <label for="eligible" class="label">Eligible to attend for...</label>
            <input type="text" class="form-control" id="eligible" name="eligible" placeholder="Ex: Everyone, COC, CCIS" value="{{ isset($event) ? $event->eligible : old('eligible') }}" required>
        </div>

        <div class="form-group">
            <label for="event_date" class="label">Event Date and Time</label>
            <input type="datetime-local" class="form-control" id="event_date" name="event_date" value="{{ isset($event) ? $event->event_date : old('event_date') }}" required>
        </div>

        <!-- Hidden department field -->
        <div class="form-group">
            <input type="hidden" name="colleges" value="{{ auth()->user()->colleges }}">
        </div>

        <button type="submit" class="btn-primary" id="submitBtn">{{ isset($event) ? 'Update Event' : 'Save Event' }}</button>
    </form>
</div>
@endsection