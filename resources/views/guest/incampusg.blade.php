@extends('layout.eventslayout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/incampus.css') }}">

<!-- Search Bar Container -->
<div class="content-container-parent">
    <!-- Upcoming Events Container -->
    <div class="content-container">
        <form method="GET" action="{{ route('guest.auth.incampus') }}" class="search-form">
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
                    <div 
                        class="cardincampus_incampus" 
                        data-title="{{ strtolower($event->title) }}" 
                        data-colleges="{{ strtolower($event->colleges) }}"
                    >
                        <img src="{{ asset('storage/' . $event->image) }}" class="cardimgincampus_incampus" alt="{{ $event->title }}">
                        <div class="cardbodyincampus_incampus">
                            <h5 class="cardtcollegeincampus_incampus">{{ $event->colleges }}</h5>
                            <h5 class="cardtitleincampus_incampus">{{ $event->title }}</h5>
                            <h2 class="cardtextincampus_incampus">Open for: {{ $event->eligible }}</h2>
                            <p class="cardtextincampus_incampus">{{ Str::limit($event->description, 250, '...') }}</p>
                            <p class="event-date">{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A') }}</p>
                            <a href="{{ $event->href }}" class="btnlinkincampus_incampus text-danger">Click here for more details.</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination for Upcoming Events -->
            <div class="pagination-container">
                {{ $upcomingEvents->appends(['ended_page' => request()->get('ended_page'), 'search' => request()->get('search')])->links('pagination::simple-bootstrap-4') }}
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
                {{ $endedEvents->appends(['upcoming_page' => request()->get('upcoming_page'), 'search' => request()->get('search')])->links('pagination::simple-bootstrap-4') }}
            </div>
        @endif
    </div>
</div>

@endsection
