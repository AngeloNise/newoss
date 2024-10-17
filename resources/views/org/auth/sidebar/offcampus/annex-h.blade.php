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
    <form action="{{ url('/annex-c') }}" method="POST">
    @csrf
        <h2> COMPLIED STUDENT REQUIREMENTS (Annex-H) </h2>
        <div id="receipt-for-equipment">
            <div class="equipment">
                <div class="fra-group">
                    <label for="name">NAME OF STUDENT</label>
                    @if (is_array(old('name')))
                        @foreach (old('name') as $index => $name)
                            <input type="text" id="name" name="name[]" class="form-control" value="{{ $name }}">
                        @endforeach
                    @else
                        <input type="text" id="name" name="name[]" class="form-control" value="">
                    @endif
                </div>
                
                <div class="fra-group">
                    <label for="mobility">MOBILITY</label>
                    @if (is_array(old('mobility')))
                        @foreach (old('mobility') as $index => $mobility)
                            <input type="text" id="mobility" name="mobility[]" class="form-control" value="{{ $mobility }}">
                        @endforeach
                    @else
                        <input type="text" id="mobility" name="mobility[]" class="form-control" value="">
                    @endif
                </div>
        
                <div class="fra-group">
                    <label for="cor">CERTIFICATE OF REGISTRATION</label>
                    @if (is_array(old('cor')))
                        @foreach (old('cor') as $index => $cor)
                            <input type="text" id="cor" name="cor[]" class="form-control" value="{{ $cor }}">
                        @endforeach
                    @else
                        <input type="text" id="cor" name="cor[]" class="form-control" value="">
                    @endif
                </div>

                <div class="fra-group">
                    <label for="iiot">INDIVIDUAL ITINERARY OF TRAVEL</label>
                    @if (is_array(old('iiot')))
                        @foreach (old('iiot') as $index => $cobc)
                            <input type="text" id="iiot" name="iiot[]" class="form-control" value="{{ $iiot }}">
                        @endforeach
                    @else
                        <input type="text" id="iiot" name="iiot[]" class="form-control" value="">
                    @endif
                </div>

                <div class="fra-group">
                    <label for="passport">PASSPORT</label>
                    @if (is_array(old('passport')))
                        @foreach (old('passport') as $index => $passport)
                            <input type="text" id="passport" name="passport[]" class="form-control" value="{{ $passport }}">
                        @endforeach
                    @else
                        <input type="text" id="passport" name="passport[]" class="form-control" value="">
                    @endif
                </div>

                <div class="fra-group">
                    <label for="mc">MEDICAL CLEARANCE</label>
                    @if (is_array(old('mc')))
                        @foreach (old('mc') as $index => $mc)
                            <input type="text" id="mc" name="mc[]" class="form-control" value="{{ $mc }}">
                        @endforeach
                    @else
                        <input type="text" id="mc" name="mc[]" class="form-control" value="">
                    @endif
                </div>

                <div class="fra-group">
                    <label for="insurance">INSURANCE</label>
                    @if (is_array(old('insurance')))
                        @foreach (old('insurance') as $index => $insurance)
                            <input type="text" id="insurance" name="insurance[]" class="form-control" value="{{ $insurance }}">
                        @endforeach
                    @else
                        <input type="text" id="insurance" name="insurance[]" class="form-control" value="">
                    @endif
                </div>

                <div class="fra-group">
                    <label for="cf">CONSENT FORM</label>
                    @if (is_array(old('cf')))
                        @foreach (old('cf') as $index => $cf)
                            <input type="text" id="cf" name="cf[]" class="form-control" value="{{ $cf }}">
                        @endforeach
                    @else
                        <input type="text" id="cf" name="cf[]" class="form-control" value="">
                    @endif
                </div>
            </div>
        </div>

        <div class="button-receipt">
            <button type="button" id="remove-receipt-for-equipment">Remove</button>
            <button type="button" id="add-receipt-for-equipment">Add</button>
        </div>  

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection