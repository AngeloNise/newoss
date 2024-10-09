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
        <h2>FUND RAISING ACTIVITY APPLICATION (Annex-C)</h2>
        <div id="receipt-for-equipment">
            <div class="equipment">
                <div class="fra-group">
                    <label for="qty">Qty.</label>
                    @if (is_array(old('qty')))
                        @foreach (old('qty') as $index => $qty)
                            <input type="text" id="qty" name="qty[]" class="form-control" value="{{ $qty }}">
                        @endforeach
                    @else
                        <input type="text" id="qty" name="qty[]" class="form-control" value="">
                    @endif
                </div>
                
                <div class="fra-group">
                    <label for="unit">Unit</label>
                    @if (is_array(old('unit')))
                        @foreach (old('unit') as $index => $unit)
                            <input type="text" id="unit" name="unit[]" class="form-control" value="{{ $unit }}">
                        @endforeach
                    @else
                        <input type="text" id="unit" name="unit[]" class="form-control" value="">
                    @endif
                </div>
        
                <div class="fra-group">
                    <label for="item_description">Item/Description</label>
                    @if (is_array(old('item_description')))
                        @foreach (old('item_description') as $index => $item_description)
                            <input type="text" id="item_description" name="item_description[]" class="form-control" value="{{ $item_description }}">
                        @endforeach
                    @else
                        <input type="text" id="item_description" name="item_description[]" class="form-control" value="">
                    @endif
                </div>
        
                <div class="fra-group">
                    <label for="serial_no">Serial No.</label>
                    @if (is_array(old('serial_no')))
                        @foreach (old('serial_no') as $index => $serial_no)
                            <input type="text" id="serial_no" name="serial_no[]" class="form-control" value="{{ $serial_no }}">
                        @endforeach
                    @else
                        <input type="text" id="serial_no" name="serial_no[]" class="form-control" value="">
                    @endif
                </div>
        
                <div class="fra-group">
                    <label for="property_no">Property No.</label>
                    @if (is_array(old('property_no')))
                        @foreach (old('property_no') as $index => $property_no)
                            <input type="text" id="property_no" name="property_no[]" class="form-control" value="{{ $property_no }}">
                        @endforeach
                    @else
                        <input type="text" id="property_no" name="property_no[]" class="form-control" value="">
                    @endif
                </div>

                <div class="fra-group">
                    <label for="unit_cost">Unit Cost</label>
                    @if (is_array(old('unit_cost')))
                        @foreach (old('unit_cost') as $index => $unit_cost)
                            <input type="text" id="unit_cost" name="unit_cost[]" class="form-control" value="{{ $unit_cost }}">
                        @endforeach
                    @else
                        <input type="text" id="unit_cost" name="unit_cost[]" class="form-control" value="">
                    @endif
                </div>

                <div class="fra-group">
                    <label for="total_amount">Total Amount</label>
                    @if (is_array(old('total_amount')))
                        @foreach (old('total_amount') as $index => $total_amount)
                            <input type="text" id="total_amount" name="total_amount[]" class="form-control" value="{{ $total_amount }}">
                        @endforeach
                    @else
                        <input type="text" id="total_amount" name="total_amount[]" class="form-control" value="">
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