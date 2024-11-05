@extends('layout.adminlayout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/secretform.css') }}">

<div class="fra-container">
    <form action="{{ route('faculty.secretform123.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="duration">
            <div class="split">
                <div class="fra-group">
                    <label for="pup_logo">PUP LOGO</label>
                    <input type="file" id="pup_logo" name="pup_logo" class="form-control" required>
                </div>

                <div class="fra-group">
                    <label for="ched_logo">CHED LOGO</label>
                    <input type="file" id="ched_logo" name="ched_logo" class="form-control" required>
                </div>

                <div class="fra-group">
                    <label for="oss_logo">OSS LOGO</label>
                    <input type="file" id="oss_logo" name="oss_logo" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
