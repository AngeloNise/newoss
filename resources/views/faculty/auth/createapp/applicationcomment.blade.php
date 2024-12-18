@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/applicationaddcomment.css') }}">

<div class="fra-container">
    <div class="comment-container">
        <h2>Add Comment for {{ $application->name_of_project }}</h2>

        @if(Session::has('success'))
            <script>
                window.flashMessage = {
                    message: "{{ Session::get('success') }}",
                    type: "success"
                };
            </script>
        @endif

        @if(Session::has('error'))
            <script>
                window.flashMessage = {
                    message: "{{ Session::get('error') }}",
                    type: "error"
                };
            </script>
        @endif
        
        <form method="POST" action="{{ route('faculty.applications.comments.store', $application->id) }}">
            @csrf
            <div class="form-group">
                <select name="document" id="document" class="form-control" required>
                    <option value="" disabled selected>Select a document</option>
                    <option value="Pre-numbered tickets">Pre-numbered tickets</option>
                    <option value="Official receipts">Official receipts</option>
                    <option value="Control sheets">Control sheets</option>
                    <option value="Reservation Slip for use of venue">Reservation Slip for use of venue</option>
                    <option value="Goods/services inspection report">Goods/services inspection report</option>
                    <option value="Statement of Projected Net Income and Expenses">Statement of Projected Net Income and Expenses</option>
                </select>
            </div>

            <div class="form-group">
                <label for="comment">Comment</label>
                <input type="text" name="comment" id="comment" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Submit Comment</button>
        </form>
    </div>
</div>
@endsection
