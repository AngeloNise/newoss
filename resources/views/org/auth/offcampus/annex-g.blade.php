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
    <form action="{{ url('/annex-g') }}" method="POST">
    @csrf
        <h2> TRAVEL RISK ASSESSMENT (Annex-G) </h2>
        <div class="fra-group">
            <label for="pot">Purpose of Travel</label>
            @if (is_array(old('pot')))
                @foreach (old('pot') as $index => $pot)
                    <input type="text" id="pot" name="pot[]" class="form-control" value="{{ $pot }}">
                @endforeach
            @else
                <input type="text" id="pot" name="pot[]" class="form-control" value="">
            @endif
        </div>

        <div class="fra-group">
            <label for="destination">Destination</label>
            @if (is_array(old('destination')))
                @foreach (old('destination') as $index => $destination)
                    <input type="text" id="destination" name="destination[]" class="form-control" value="{{ $destination }}">
                @endforeach
            @else
                <input type="text" id="destination" name="destination[]" class="form-control" value="">
            @endif
        </div>

        <div class="fra-group">
            <label for="prot">Period of Travel</label>
            @if (is_array(old('prot')))
                @foreach (old('prot') as $index => $prot)
                    <input type="text" id="prot" name="prot[]" class="form-control" value="{{ $prot }}">
                @endforeach
            @else
                <input type="text" id="prot" name="prot[]" class="form-control" value="">
            @endif
        </div>

        <div class="fra-group">
            <label for="so">Sponsoring Organization</label>
            @if (is_array(old('so')))
                @foreach (old('so') as $index => $so)
                    <input type="text" id="so" name="so[]" class="form-control" value="{{ $so }}">
                @endforeach
            @else
                <input type="text" id="so" name="so[]" class="form-control" value="">
            @endif
        </div>

        <div class="fra-group">
            <label for="rp">We will take reasonable precautions to avoid putting ourselves at risk.</label>
            @if (is_array(old('rp')))
                @foreach (old('rp') as $index => $rp)
                    <input type="text" id="rp" name="rp[]" class="form-control" value="{{ $rp }}">
                @endforeach
            @else
                <input type="text" id="rp" name="rp[]" class="form-control" value="">
            @endif
        </div>

        <div class="button-receipt">
            <button type="button" id="remove-receipt-for-equipment">Remove</button>
            <button type="button" id="add-receipt-for-equipment">Add</button>
        </div>

        <h3 style="color: #333"><center> Risk Assessment </h3>
        <div id="receipt-for-equipment">
            <div class="equipment">
                <div class="fra-group">
                    <label for="ph">Potential Hazard</label>
                    @if (is_array(old('ph')))
                        @foreach (old('ph') as $index => $ph)
                            <input type="text" id="ph" name="ph[]" class="form-control" value="{{ $ph }}">
                        @endforeach
                    @else
                        <input type="text" id="ph" name="ph[]" class="form-control" value="">
                    @endif
                </div>
        
                <div class="fra-group">
                    <label for="pm">Preventive Measures</label>
                    @if (is_array(old('pm')))
                        @foreach (old('pm') as $index => $pm)
                            <input type="text" id="pm" name="pm[]" class="form-control" value="{{ $pm }}">
                        @endforeach
                    @else
                        <input type="text" id="pm" name="pm[]" class="form-control" value="">
                    @endif
                </div>
            </div>
        </div>

        <div class="button-receipt">
            <button type="button" id="remove-receipt-for-equipment">Remove</button>
            <button type="button" id="add-receipt-for-equipment">Add</button>
        </div>  

        <h4>Student/s: are signing to indicate that we have read and will abide by the statements above and will carry out additional risk assessment where necessary.</h4>
        
        <div id="receipt-for-equipment">
            <div class="equipment">
                <div class="fra-group">
                    <label for="name">Name</label>
                    @if (is_array(old('name')))
                        @foreach (old('name') as $index => $name)
                            <input type="text" id="name" name="name[]" class="form-control" value="{{ $name }}">
                        @endforeach
                    @else
                        <input type="text" id="name" name="name[]" class="form-control" value="">
                    @endif
                </div>
        
                <div class="fra-group">
                    <label for="cn">Contact Number</label>
                    @if (is_array(old('cn')))
                        @foreach (old('cn') as $index => $cn)
                            <input type="text" id="cn" name="cn[]" class="form-control" value="{{ $cn }}">
                        @endforeach
                    @else
                        <input type="text" id="cn" name="cn[]" class="form-control" value="">
                    @endif
                </div>
            </div>
        </div>

        <div class="button-receipt">
            <button type="button" id="remove-receipt-for-equipment">Remove</button>
            <button type="button" id="add-receipt-for-equipment">Add</button>
        </div> 

        <h4> Personnel-in-charge: I am signing to indicate that this is sufficient as a risk assessment, and I give my permission and guidance for the intended academic activity. </h4>
        
        <div id="receipt-for-equipment">
            <div class="equipment">
                <div class="fra-group">
                    <label for="name">Name</label>
                    @if (is_array(old('name')))
                        @foreach (old('name') as $index => $name)
                            <input type="text" id="name" name="name[]" class="form-control" value="{{ $name }}">
                        @endforeach
                    @else
                        <input type="text" id="name" name="name[]" class="form-control" value="">
                    @endif
                </div>
        
                <div class="fra-group">
                    <label for="cn">Contact Number</label>
                    @if (is_array(old('cn')))
                        @foreach (old('cn') as $index => $cn)
                            <input type="text" id="cn" name="cn[]" class="form-control" value="{{ $cn }}">
                        @endforeach
                    @else
                        <input type="text" id="cn" name="cn[]" class="form-control" value="">
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