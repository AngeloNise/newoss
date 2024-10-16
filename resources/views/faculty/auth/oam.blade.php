@extends('layout.adminlayout')

@section('content')

<div class="container">
    <h2>Organization Account Management</h2>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Person in Charge</th>
                <th>Webmail</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($organizations as $organization)
                <tr>
                    <td>{{ $organization->name_of_organization }}</td>
                    <td>{{ $organization->name }}</td>
                    <td>{{ $organization->email }}</td>
                    <td>{{ $organization->status }}</td>
                    <td>
                        <a href="{{ route('faculty.orgs.edit', $organization->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('faculty.orgs.remove', $organization->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this organization?');">Remove</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection