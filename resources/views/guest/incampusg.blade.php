@extends('layout.eventslayout')

@section('content')
<style>
    .container_incampus {
        max-width: 90%;         /* Set the maximum width of the container. Adjust to increase or decrease width. */
        margin: 0 auto;         /* Center the container horizontally in the page. */
        padding: 20px;          /* Add padding inside the container for spacing. Adjust to increase or decrease space. */
    }

    .headerincampus_incampus {
        text-align: center;      /* Center the header container */
        margin-top: 70px;   /* Space above (top margin) and below (bottom margin) the header. Adjust the first value for top margin. */
        margin-left: 250px;
    }

    .formincampus-control_incampus {
        border-radius: 5px;      /* Round the corners of the input field. Adjust for more or less rounding. */
        border: 1px solid #ccc;  /* Set border style and color for the input field. Change color for different border styles. */
        padding: 10px;           /* Add padding inside the input field. Adjust for more or less space. */
        margin-bottom: 15px;      /* Space below the input field. Adjust to increase or decrease space. */
        width: 100%;              /* Set the width of the input field to full container width. Change to a specific width if needed. */
    }

    .btnincampus-primary_incampus {
        background-color: #ff5c5c; /* Set background color for primary button. Change hex value for different colors. */
        border-color: #ff5c5c;      /* Set border color for the button. Change hex value for different colors. */
        color: #fff;                /* Set text color for the button. Change hex value for different colors. */
        margin-left: 250px;
        padding: 10px 20px;        /* Set padding inside the button. Adjust for more or less space. */
        font-size: 16px;           /* Set font size for button text. Change the value for larger or smaller text. */
        border-radius: 5px;       /* Round the corners of the button. Adjust for more or less rounding. */
        text-decoration: none;     /* Remove underline from the button text */
        transition: background-color 0.3s ease; /* Set transition effect for background color change. Adjust duration for faster or slower transitions. */
    }

    .btnincampus-primary_incampus:hover {
        background-color: #e04e4e; /* Set background color when the button is hovered. Change hex value for different colors. */
        border-color: #e04e4e;      /* Set border color when the button is hovered. Change hex value for different colors. */
    }

    .btnincampus-edit_incampus {
        background-color: #ff5c5c; /* Set background color for primary button. Change hex value for different colors. */
        border-color: #ff5c5c;      /* Set border color for the button. Change hex value for different colors. */
        color: #fff;                /* Set text color for the button. Change hex value for different colors. */
        padding: 10px 20px;        /* Set padding inside the button. Adjust for more or less space. */
        font-size: 16px;           /* Set font size for button text. Change the value for larger or smaller text. */
        border-radius: 5px;       /* Round the corners of the button. Adjust for more or less rounding. */
        text-decoration: none;     /* Remove underline from the button text */
        transition: background-color 0.3s ease; /* Set transition effect for background color change. Adjust duration for faster or slower transitions. */

    }

    .btnincampus-edit_incampus:hover {
        background-color: #e04e4e; /* Set background color when the button is hovered. Change hex value for different colors. */
        border-color: #e04e4e;      /* Set border color when the button is hovered. Change hex value for different colors. */
    }

    .btnincampus-delete_incampus {
        background-color: #ff5c5c; /* Set background color for primary button. Change hex value for different colors. */
        border-color: #ff5c5c;      /* Set border color for the button. Change hex value for different colors. */
        color: #fff;                /* Set text color for the button. Change hex value for different colors. */
        padding: 10px 20px;        /* Set padding inside the button. Adjust for more or less space. */
        font-size: 16px;           /* Set font size for button text. Change the value for larger or smaller text. */
        border-radius: 5px;       /* Round the corners of the button. Adjust for more or less rounding. */
        text-decoration: none;     /* Remove underline from the button text */
        transition: background-color 0.3s ease; /* Set transition effect for background color change. Adjust duration for faster or slower transitions. */

    }

    .btnincampus-delete_incampus:hover {
        background-color: #e04e4e; /* Set background color when the button is hovered. Change hex value for different colors. */
        border-color: #e04e4e;      /* Set border color when the button is hovered. Change hex value for different colors. */
    }

    .alertincampus_incampus {
        margin-bottom: 20px;       /* Space below the alert box. Adjust to increase or decrease space. */
        padding: 15px;             /* Add padding inside the alert box. Adjust for more or less space. */
        border-radius: 5px;        /* Round the corners of the alert box. Adjust for more or less rounding. */
        color: #fff;               /* Set text color for alert messages. Change hex value for different colors. */
        text-align: center;         /* Center-align text inside the alert. Change to 'left' or 'right' for different alignment. */
    }

    .alertsuccessincampus_incampus {
        background-color: #4CAF50; /* Set background color for success alerts. Change hex value for different colors. */
    }

    .alerterrorincampus_incampus {
        background-color: #f44336; /* Set background color for error alerts. Change hex value for different colors. */
    }

    .cards-container {
        display: flex;            /* Use flexbox for layout */
        flex-wrap: wrap;         /* Allow wrapping of items to the next line */
        justify-content: space-between; /* Space out cards evenly */
    }

    .cardincampus_incampus {
        border: 1px solid #ddd;    /* Set border style and color for the card. Change hex value for different colors. */
        border-radius: 10px;       /* Round the corners of the card. Adjust for more or less rounding. */
        margin-bottom: 20px;       /* Space below the card. Adjust to increase or decrease space. */
        margin-left: 250px;
        box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1); /* Set shadow for card. Adjust values for different shadow effects. */
        text-align: center;         /* Center content inside the card. Change to 'left' or 'right' for different alignment. */
        padding: 15px;             /* Add padding inside the card for better spacing */
        width: calc(30% - 20px);   /* Set width of card to be 30% of container width, accounting for margins */
    }

    .cardincampus_incampus img {
        width: 100%;                /* Set width for images within cards. Adjust to fit your design needs. */
        height: 300px;             /* Set a fixed height for images. Adjust to increase or decrease height. */
        object-fit: contain;        /* Ensure images cover the area without distortion. Change to 'contain' for different fitting. */
        border-top-left-radius: 10px; /* Round top-left corner of images. Adjust for more or less rounding. */
        border-top-right-radius: 10px; /* Round top-right corner of images. Adjust for more or less rounding. */
    }

    .cardbodyincampus_incampus {
        padding: 15px;             /* Add padding inside the card body. Adjust for more or less space. */
    }

    .btnlinkincampus_incampus {
        color: #ff5c5c;            /* Set text color for links. Change hex value for different colors. */
        display: block;            /* Make the link a block element to not be on the same row as others */
        margin-top: 10px;         /* Optional: space above the link */
    }

    .btnlinkincampus_incampus:hover {
        color: #e04e4e;            /* Set text color when link is hovered. Change hex value for different colors. */
        text-decoration: none;      /* Remove underline on hover. Change to 'underline' for consistent underlining. */
    }

    .create-button {
        margin-bottom: 20px;       /* Space below the create button. Adjust to increase or decrease space. */
        display: flex;             /* Use flexbox for layout. Adjust for different display styles if needed. */
        justify-content: center;    /* Center-align the button in its container. Change to 'flex-start' or 'flex-end' for different alignment. */
    }

    .search-bar {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .search-bar input[type="text"] {
        width: 300px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .search-bar button {
        padding: 10px;
        background-color: #ff5c5c;
        color: white;
        border: none;
        border-radius: 5px;
        margin-left: 10px;
        cursor: pointer;
    }

    .search-bar button:hover {
        background-color: #e04e4e;
    }
</style>

<div class="container_incampus">
    <h1 class="headerincampus_incampus">Upcoming Events</h1>

     <!-- Add search bar for department -->
     <div class="search-bar">
        <form action="{{ route('events.search') }}" method="GET">
            <input type="text" name="department" placeholder="Search by Department" value="{{ request()->input('department') }}">
            <button type="submit">Search</button>
        </form>
    </div>


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


    <div class="cards-container"> <!-- Flexbox container for cards -->
        @foreach($events as $event)
            <div class="cardincampus_incampus">  <!-- Event card -->
                <img src="{{ asset('storage/' . $event->image) }}" class="cardimgincampus_incampus" alt="{{ $event->title }}">
                <div class="cardbodyincampus_incampus">
                    <h5 class="cardtitleincampus_incampus">{{ $event->title }}</h5>
                    <p class="cardtextincampus_incampus"> {{ Str::limit($event->description, 250, '...') }}</p>
                    <p class="event-date">{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A') }}</p> <!-- Adjust format as needed -->
                    <a href="{{ $event->href }}" class="btnlinkincampus_incampus text-danger">Click here for link</a>

                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
