@extends('layout.adminlayout')

@section('content')
    <div class="notification-container">
        <div class="notification">
            @if ($notifications->isEmpty())
                <p>No new notifications.</p>
            @else
                <ul>
                    @foreach ($notifications as $notification)
                        <li onclick="window.location='{{ route('faculty.fra-a-evaluation.show', $notification['id']) }}'" style="cursor:pointer;">
                            <p>{{ $notification['message'] }} - {{ $notification['time'] }}</p>
                        </li>
                    @endforeach
                </ul>
                <hr>
            @endif
        </div>
    </div>
@endsection
