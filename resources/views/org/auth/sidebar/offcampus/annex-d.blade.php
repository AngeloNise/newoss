@extends('layout.orglayout')
@section('content')

@if(Session::has('error'))
    <script>
        window.flashMessage = {
            message: "{{ Session::get('error') }}",
            type: "error"
        };
    </script>
@endif

@if(Session::has('success'))
    <script>
        window.flashMessage = {
            message: "{{ Session::get('success') }}",
            type: "success"
        };
    </script>
@endif

<div class="fra-container">
    <form action="{{ url('/annex-d') }}" method="POST">
    @csrf
        <h2> INDIVIDUAL ITINERARY OF TRAVEL (Annex-D) </h2>
        
        <div class="fra-group">
            <label for="noa">Name of Activity</label>
            <input type="text" id="noa" name="noa" class="form-control" value="{{ old('noa') }}">
        </div>

        <div class="fra-group">
            <label for="occ">Organization/College/Campus</label>
            <input type="text" id="occ" name="occ" class="form-control" value="{{ old('occ') }}">
        </div>

        <div class="fra-group">
            <label for="poa">Place of Activity</label>
            <input type="text" id="poa" name="poa" class="form-control" value="{{ old('poa') }}">
        </div>

        <div class="fra-group">
            <label for="doa">Duration of Activity</label>
            <input type="text" id="doa" name="doa" class="form-control" value="{{ old('doa') }}">
        </div>

        <div id="receipt-for-equipment">
            <div class="equipment">
                <div class="fra-group">
                    <label for="date">Date</label>
                    @if (is_array(old('date')))
                        @foreach (old('date') as $index => $date)
                            <input type="text" id="date" name="date[]" class="form-control" value="{{ $date }}">
                        @endforeach
                    @else
                        <input type="text" id="date" name="date[]" class="form-control" value="">
                    @endif
                </div>
                
                <div class="fra-group">
                    <label for="pvd">Places to be visited Destination (From Residence to venue)</label>
                    @if (is_array(old('pvd')))
                        @foreach (old('pvd') as $index => $pvd)
                            <input type="text" id="pvd" name="pvd[]" class="form-control" value="{{ $pvd }}">
                        @endforeach
                    @else
                        <input type="text" id="pvd" name="pvd[]" class="form-control" value="">
                    @endif
                </div>
        
                <div class="fra-group">
                    <label for="time">Time</label>
                    @if (is_array(old('time')))
                        @foreach (old('time') as $index => $time)
                            <input type="text" id="time" name="time[]" class="form-control" value="{{ $time }}">
                        @endforeach
                    @else
                        <input type="text" id="time" name="time[]" class="form-control" value="">
                    @endif
                </div>

                <div class="fra-group">
                    <label for="activity">Activity</label>
                    @if (is_array(old('activity')))
                        @foreach (old('activity') as $index => $activity)
                            <input type="text" id="activity" name="activity[]" class="form-control" value="{{ $activity }}">
                        @endforeach
                    @else
                        <input type="text" id="activity" name="activity[]" class="form-control" value="">
                    @endif
                </div>

                <div class="fra-group">
                    <label for="mot">Means of Transportation</label>
                    @if (is_array(old('mot')))
                        @foreach (old('mot') as $index => $mot)
                            <input type="text" id="mot" name="mot[]" class="form-control" value="{{ $mot }}">
                        @endforeach
                    @else
                        <input type="text" id="mot" name="mot[]" class="form-control" value="">
                    @endif
                </div>
            </div>
        </div>

        <div class="button-receipt">
            <button type="button" id="remove-receipt-for-equipment">Remove</button>
            <button type="button" id="add-receipt-for-equipment">Add</button>
        </div>  

        <div class="fra-group">
            <label for="prepared_by">Prepared by</label>
            <input type="text" id="prepared_by" name="prepared_by" class="form-control" placeholder="Student Participant" value="{{ old('prepared_by') }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection