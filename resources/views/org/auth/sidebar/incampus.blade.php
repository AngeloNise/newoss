@extends('layout.orglayout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/incampus.css') }}">

<div class="content-container">
    <h1 class="headerincampus_incampus">Upcoming Events</h1>

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

    <!-- Create Event Button -->
    <div class="create-button">
        <a href="{{ route('events.create') }}" class="btnincampus-primary_incampus" style="width: auto; text-align: center;">Create Event</a>
    </div>

    <div class="cards-container">
        @foreach($events as $event)
            <div class="cardincampus_incampus">
                <img src="{{ asset('storage/events/' . $event->image) }}" class="cardimgincampus_incampus" alt="{{ $event->title }}">
                <div class="cardbodyincampus_incampus">
                    <h5 class="cardtitleincampus_incampus">{{ $event->title }}</h5>
                    <p class="cardtextincampus_incampus">{{ Str::limit($event->description, 250, '...') }}</p>
                    <p class="event-date">{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A') }}</p>
                    <a href="{{ $event->href }}" class="btnlinkincampus_incampus text-danger">Click here for link</a>

                    @can('update', $event)
                        <form action="{{ route('events.edit', $event->id) }}" method="GET" style="display:inline;">
                            <button type="submit" class="btnincampus-edit_incampus">Edit</button>
                        </form>
                    @endcan

                    @can('delete', $event)
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btnincampus-delete_incampus">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alertsuccessincampus_incampus, .alerterrorincampus_incampus');

    setTimeout(() => {
        alerts.forEach(alert => {
            alert.classList.add('fade-out');
        });
    }, 2000);

    setTimeout(() => {
        alerts.forEach(alert => {
            alert.style.display = 'none';
        });
    }, 2500);
});
</script>

@endsection
