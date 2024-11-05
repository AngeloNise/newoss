@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/genpdfoptions.css') }}">

<div class="container">
    <h2>Select Report Range</h2>
    <form action="{{ route('faculty.application-admin.generate-pdf') }}" method="GET">
        @csrf

        <div class="button-group">
            <button type="submit" name="range" value="monthly" class="btn btn-primary">Monthly</button>
            <button type="submit" name="range" value="quarterly" class="btn btn-primary">Quarterly</button>
            <button type="submit" name="range" value="semi_annually" class="btn btn-primary">Semi-Annually</button>
            <button type="submit" name="range" value="annually" class="btn btn-primary">Annually</button>
        </div>

        <div class="custom-range-container">
            <h3>Custom Date Range</h3>
            <div class="split">
                <div class="pdf-group">
                    <label for="custom_start">Custom Start Date:(01-12-yyyy)</label>
                    <input type="date" id="custom_start" name="custom_start" class="form-control">
                </div>
    
                <div class="pdf-group">
                    <label for="custom_end">Custom End Date: Date:(02-12-yyyy)</label>
                    <input type="date" id="custom_end" name="custom_end" class="form-control">
                </div>
            </div>

            <button type="submit" name="range" value="custom" class="btn btn-primary">Generate Custom Range</button>
        </div>
        <br>
        <button type="submit" name="range" value="all" class="btn btn-primary">Generate All Applications</button>
    </form>
</div>
@endsection
