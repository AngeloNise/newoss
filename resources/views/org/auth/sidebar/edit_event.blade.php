@extends('layout.orglayout')

@section('content')
<style>
    .container_incampus {
        max-width: 75%;
        margin: 0 auto;
        padding: 20px;
    }

    .headerincampus_incampus {
        text-align: center;
        margin-top: 100px;
        font-family: Arial, sans-serif;
        color: #333;
        margin-bottom: 20px;
    }

    .formincampus-control_incampus {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 15px;
        width: 100%;
    }

    .btnincampus-primary_incampus {
        background-color: #ff5c5c;
        border-color: #ff5c5c;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .btnincampus-primary_incampus:hover {
        background-color: #e04e4e;
        border-color: #e04e4e;
    }
</style>

<div class="container_incampus">
    <h1 class="headerincampus_incampus">Edit Event</h1>

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

    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="labelincampus_incampus">Event Title</label>
            <input type="text" class="formincampus-control_incampus" id="title" name="title" value="{{ $event->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="labelincampus_incampus">Event Description</label>
            <textarea class="formincampus-control_incampus" id="description" name="description" rows="3" required>{{ $event->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="labelincampus_incampus">Event Image (Leave empty if you don't want to change it)</label>
            <input type="file" class="formincampus-control_incampus" id="image" name="image">
        </div>

        <div class="mb-3">
            <label for="href" class="labelincampus_incampus">Event Facebook Link</label>
            <input type="url" class="formincampus-control_incampus" id="href" name="href" value="{{ $event->href }}" required>
        </div>

        <div class="mb-3">
            <label for="event_date" class="labelincampus_incampus">Event Date and Time</label>
            <input type="datetime-local" class="formincampus-control_incampus" id="event_date" name="event_date" value="{{ $event->event_date }}" required>
        </div>

        <!-- Add Department input for editing -->
        <div class="mb-3">
            <label for="department" class="labelincampus_incampus">Department</label>
            <input type="text" class="formincampus-control_incampus" id="department" name="department" value="{{ $event->department }}" required>
        </div>

        <button type="submit" class="btnincampus-primary_incampus">Update Event</button>
    </form>
</div>
@endsection