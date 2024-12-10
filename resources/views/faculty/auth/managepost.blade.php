@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/manageevent.css') }}">

<!-- Manage Events Container -->
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
        <form method="GET" action="{{ route('faculty.managepost') }}" class="search-form">
            <input 
                type="text" 
                id="searchBar" 
                name="search" 
                value="{{ request()->get('search') }}" 
                placeholder="Search by Title or Colleges..." 
                class="search-bar">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>        
        
        <h2 class="headerincampus_incampus">Upcoming Events</h2>
        @if($upcomingEvents->isEmpty())
            <p class="no-events-message">No upcoming events.</p>
        @else
            <div class="cards-container" id="upcomingEventsContainer">
                @foreach($upcomingEvents as $event)
                    <div class="cardincampus_incampus" data-title="{{ strtolower($event->title) }}" data-colleges="{{ strtolower($event->colleges) }}">
                        <img src="{{ asset('storage/' . $event->image) }}" class="cardimgincampus_incampus" alt="{{ $event->title }}">
                        <div class="cardbodyincampus_incampus">
                            <h5 class="cardtcollegeincampus_incampus">{{ $event->colleges }}</h5>
                            <h5 class="cardtitleincampus_incampus">{{ $event->title }}</h5>
                            <p class="cardtextincampus_incampus">{{ Str::limit($event->description, 250, '...') }}</p>
                            <h2 class="cardtextincampus_incampus">Open for: {{ $event->eligible }}</h2>
                            <p class="event-date">{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A') }}</p>
                            <a href="{{ $event->href }}" class="btnlinkincampus_incampus text-danger">Click here for more details.</a>

                            @can('delete', $event)
                                <form action="{{ route('faculty.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btnincampus-delete_incampus">Delete</button>
                                </form>
                            @endcan
                        
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

    <!-- Ended Events Section -->
    <div class="content-container-finished">
        <h2 class="headerincampus_incampus">Ended Events</h2>
        @if($endedEvents->isEmpty())
            <p class="no-events-message">No ended events.</p>
        @else
            <div class="cards-container" id="endedEventsContainer">
                @foreach($endedEvents as $event)
                    <div class="cardincampus_incampus" data-title="{{ strtolower($event->title) }}" data-colleges="{{ strtolower($event->colleges) }}">
                        <img src="{{ asset('storage/' . $event->image) }}" class="cardimgincampus_incampus" alt="{{ $event->title }}">
                        <div class="cardbodyincampus_incampus">
                            <h5 class="cardtcollegeincampus_incampus">{{ $event->colleges }}</h5>
                            <h5 class="cardtitleincampus_incampus">{{ $event->title }}</h5>
                            <p class="cardtextincampus_incampus">{{ Str::limit($event->description, 250, '...') }}</p>
                            <h2 class="cardtextincampus_incampus">Open for: {{ $event->eligible }}</h2>
                            <p class="event-date">{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A') }}</p>
                            <a href="{{ $event->href }}" class="btnlinkincampus_incampus text-danger">Click here for more details.</a>

                            <!-- Edit/Delete buttons for authorized users -->
                            @can('delete', $event)
                                <form action="{{ route('faculty.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btnincampus-delete_incampus">Delete</button>
                                </form>
                            @endcan
                        
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination for Ended Events -->
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
