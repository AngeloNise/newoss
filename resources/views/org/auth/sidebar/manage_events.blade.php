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
                        <button class="btnincampus-delete_incampus delete-button" data-event-id="{{ $event->id }}">
                            Delete
                        </button>
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
                    <!-- Delete button -->
                    @can('delete', $event)
                        <button class="btnincampus-delete_incampus delete-button" data-event-id="{{ $event->id }}">
                            Delete
                        </button>
                    @endcan
                </div>
            </div>
        @empty
            <p>No finished events found for your organization.</p>
        @endforelse
    </div>
</div>

<!-- Overlay -->
<div id="deleteOverlay" class="overlay">
    <div class="overlay-content">
        <div class="icon">
            <!-- Trash icon as SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path d="M3 6l3 18h12l3-18H3zm15 16H6l-2-14h16l-2 14zM10 2v2h4V2h-4z"/>
            </svg>
        </div>
        <p>Are you sure you want to delete this event?</p>
        <div class="overlay-buttons">
            <button id="cancelButton" class="btn btn-secondary">Cancel</button>
            <form id="confirmDeleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');
        const deleteOverlay = document.getElementById('deleteOverlay');
        const confirmDeleteForm = document.getElementById('confirmDeleteForm');
        const cancelButton = document.getElementById('cancelButton');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const eventId = this.dataset.eventId;
                confirmDeleteForm.action = `/events/${eventId}`;
                deleteOverlay.style.display = 'flex';
            });
        });

        cancelButton.addEventListener('click', function () {
            deleteOverlay.style.display = 'none';
        });
    });
</script>

@endsection
