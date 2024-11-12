@extends('layout.orglayout')

@section('content')
<style>
    .container_incampus {
        max-width: 75%;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
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

    .alertincampus_incampus {
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 5px;
        color: #fff;
        text-align: center;
    }

    .alertsuccessincampus_incampus {
        background-color: #4CAF50;
    }

    .alerterrorincampus_incampus {
        background-color: #f44336;
    }
</style>

<div class="container_incampus">
    <h1 class="headerincampus_incampus">Create Event</h1>

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

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="labelincampus_incampus">Event Title</label>
            <input type="text" class="formincampus-control_incampus" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="labelincampus_incampus">Event Description</label>
            <textarea class="formincampus-control_incampus" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="labelincampus_incampus">Event Image</label>
            <input type="file" class="formincampus-control_incampus" id="image" name="image" required>
        </div>

        <div class="mb-3">
            <label for="href" class="labelincampus_incampus">Event Facebook Link</label>
            <input type="url" class="formincampus-control_incampus" id="href" name="href" required>
        </div>

        <div class="mb-3">
            <label for="event_date" class="labelincampus_incampus">Event Date and Time</label>
            <input type="datetime-local" class="formincampus-control_incampus" id="event_date" name="event_date" required>
        </div>

        <!-- Add new Department input -->
        <div class="mb-3">
            <label for="department" class="labelincampus_incampus">Department</label>
            <input type="text" class="formincampus-control_incampus" id="department" name="department" placeholder="Enter Department" required>
        </div>

        <button type="submit" class="btnincampus-primary_incampus">Save Event</button>
    </form>
</div>
@endsection
