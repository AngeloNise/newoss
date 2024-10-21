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
    <form action="{{ url('/annex-b') }}" method="POST">
    @csrf
        <h2> Annex B </h2>
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
                    <label for="participation">Paticipation</label>
                    @if (is_array(old('participation')))
                        @foreach (old('participation') as $index => $participation)
                            <input type="text" id="participation" name="participation[]" class="form-control" value="{{ $participation }}">
                        @endforeach
                    @else
                        <input type="text" id="participation" name="participation[]" class="form-control" value="">
                    @endif
                </div>
        
                <div class="fra-group">
                    <label for="cobc">College/ Organization/ Branch/ Campus</label>
                    @if (is_array(old('cobc')))
                        @foreach (old('cobc') as $index => $cobc)
                            <input type="text" id="cobc" name="cobc[]" class="form-control" value="{{ $cobc }}">
                        @endforeach
                    @else
                        <input type="text" id="cobc" name="cobc[]" class="form-control" value="">
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