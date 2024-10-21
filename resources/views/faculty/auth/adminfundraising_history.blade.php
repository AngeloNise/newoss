@extends('layout.adminlayout')

@section('content')

<div class="container">
    <h2>Fund Raising History</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h4>Add New Fund Raising Activity</h4>
    <form action="{{ route('admin.fundraising.history.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="organization_id">Select Organization</label>
            <select name="organization_id" id="organization_id" class="form-control" required>
                @foreach ($organizations as $organization)
                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="document">Upload Document</label>
            <input type="file" id="document" name="document" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_issued">Date Issued</label>
            <input type="date" id="date_issued" name="date_issued" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="proposed_activity">Proposed Activity</label>
            <input type="text" id="proposed_activity" name="proposed_activity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" id="status" name="status" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Fundraising Activity</button>
    </form>

    <h4>Fund Raising Activities History</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date Issued</th>
                <th>Organization</th>
                <th>Proposed Activity</th>
                <th>Location</th>
                <th>Document</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fundRaisingHistory as $activity)
                <tr>
                    <td>{{ $activity->date_issued }}</td>
                    <td>{{ $activity->organization->name }}</td>
                    <td>{{ $activity->proposed_activity }}</td>
                    <td>{{ $activity->location }}</td>
                    <td><a href="{{ asset('storage/' . $activity->document) }}">{{ basename($activity->document) }}</a></td>
                    <td>{{ $activity->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
