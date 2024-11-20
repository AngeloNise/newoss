@extends('layout.orglayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/eventmanage.css') }}">

<div class="content-container">
    <h1 class="headerincampus_incampus">Created Events</h1>

    <!-- Success and error alert handling -->
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
    
    <!-- Upcoming Events Cards -->
    <div class="cards-container">
        @forelse($upcomingEvents as $event)
            <div class="cardincampus_incampus">
                <img src="{{ asset('storage/' . $event->image) }}" class="cardimgincampus_incampus" alt="{{ $event->title }}">
                <div class="cardbodyincampus_incampus">
                    <h5 class="cardtitleincampus_incampus">{{ $event->title }}</h5>
                    <p class="cardtextincampus_incampus">{{ Str::limit($event->description, 250, '...') }}</p>
                    <h2 class="cardtextincampus_incampus">Open for: {{ $event->eligible }}</h2>
                    <p class="event-date">{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A') }}</p>
                    <!-- Edit and Delete buttons -->
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
        @empty
            <p>No created events found for your organization. Please create one.</p>
        @endforelse
    </div>
    
    <!-- Finished Events Cards -->
    <h2 class="headerincampus_incampus">Finished Events</h2>
    <div class="cards-container">
        @forelse($endedEvents as $event)
            <div class="cardincampus_incampus">
                <img src="{{ asset('storage/' . $event->image) }}" class="cardimgincampus_incampus" alt="{{ $event->title }}">
                <div class="cardbodyincampus_incampus">
                    <h5 class="cardtitleincampus_incampus">{{ $event->title }}</h5>
                    <p class="cardtextincampus_incampus">{{ Str::limit($event->description, 250, '...') }}</p>
                    <h2 class="cardtextincampus_incampus">Open for: {{ $event->eligible }}</h2>
                    <p class="event-date">{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A') }}</p>
                    <!-- Edit and Delete buttons -->

                    @can('delete', $event)
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btnincampus-delete_incampus">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        @empty
            <p>No finished events found for your organization.</p>
        @endforelse
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
