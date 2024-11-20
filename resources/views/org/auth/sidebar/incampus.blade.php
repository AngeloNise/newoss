@extends('layout.orglayout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/incampus.css') }}">

<!-- Upcoming Events Container -->
<div class="content-container-parent">
    <div class="content-container">
        <!-- Alerts -->
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

        <!-- Search Bar -->
        <input type="text" id="searchBar" placeholder="Search by Title or Colleges..." class="search-bar" onkeyup="filterEvents()">

        <!-- Create and Manage Buttons -->
        <div class="buttons-container">
            <!-- Create Event Button -->
            <div class="create-button">
                <a href="{{ route('events.create') }}" class="btnincampus-primary_incampus">Create Event</a>
            </div>

            <!-- Manage Events Button -->
            <div class="manage-button">
                <a href="{{ route('events.manage') }}" class="btnincampus-primary_incampus">Manage Events</a>
            </div>
        </div>

        <!-- Upcoming Events -->
        <h2 class="headerincampus_incampus">Upcoming Events</h2>
        @if($upcomingEvents->isEmpty())
            <p class="no-events-message">No upcoming events.</p>
        @else
            <div class="cards-container" id="upcomingEventsContainer">
                @foreach($upcomingEvents as $event)
                    <div 
                        class="cardincampus_incampus" 
                        data-title="{{ strtolower($event->title) }}" 
                        data-colleges="{{ strtolower($event->colleges) }}"
                    >
                        <img src="{{ asset('storage/' . $event->image) }}" class="cardimgincampus_incampus" alt="{{ $event->title }}">
                        <div class="cardbodyincampus_incampus">
                            <h5 class="cardtcollegeincampus_incampus">{{ $event->colleges }}</h5>
                            <h5 class="cardtitleincampus_incampus">{{ $event->title }}</h5>
                            <p class="cardtextincampus_incampus">{{ Str::limit($event->description, 250, '...') }}</p>
                            <h2 class="cardtextincampus_incampus">Open for: {{ $event->eligible }}</h2>
                            <p class="event-date">{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A') }}</p>
                            <a href="{{ $event->href }}" class="btnlinkincampus_incampus text-danger">Click here for more details.</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination for Upcoming Events -->
            <div class="pagination-container">
                {{ $upcomingEvents->appends(['ended_page' => request()->get('ended_page')])->links('pagination::simple-bootstrap-4') }}
            </div>
        @endif
    </div>

<!-- Finished Events Container -->
    <div class="content-container-finished">
        <h2 class="headerincampus_incampus">Finished Events</h2>
        @if($endedEvents->isEmpty())
            <p class="no-events-message">No finished events.</p>
        @else
            <div class="cards-container" id="endedEventsContainer">
                @foreach($endedEvents as $event)
                    <div 
                        class="cardincampus_incampus" 
                        data-title="{{ strtolower($event->title) }}" 
                        data-colleges="{{ strtolower($event->colleges) }}"
                    >
                        <img src="{{ asset('storage/' . $event->image) }}" class="cardimgincampus_incampus" alt="{{ $event->title }}">
                        <div class="cardbodyincampus_incampus">
                            <h5 class="cardtcollegeincampus_incampus">{{ $event->colleges }}</h5>
                            <h5 class="cardtitleincampus_incampus">{{ $event->title }}</h5>
                            <p class="cardtextincampus_incampus">{{ Str::limit($event->description, 250, '...') }}</p>
                            <h2 class="cardtextincampus_incampus">Open for: {{ $event->eligible }}</h2>
                            <p class="event-date">{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A') }}</p>
                            <a href="{{ $event->href }}" class="btnlinkincampus_incampus text-danger">Click here for more details.</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination for Finished Events -->
            <div class="pagination-container">
                {{ $endedEvents->appends(['upcoming_page' => request()->get('upcoming_page')])->links('pagination::simple-bootstrap-4') }}
            </div>
        @endif
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

function filterEvents() {
    const searchInput = document.getElementById('searchBar').value.toLowerCase();
    const eventCards = document.querySelectorAll('#upcomingEventsContainer .cardincampus_incampus, #endedEventsContainer .cardincampus_incampus');

    eventCards.forEach(card => {
        const title = card.getAttribute('data-title');
        const colleges = card.getAttribute('data-colleges');
        
        if (title.includes(searchInput) || colleges.includes(searchInput)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}
</script>

@endsection
