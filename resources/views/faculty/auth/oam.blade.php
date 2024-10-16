@extends('layout.adminlayout')

@section('content')

<div class="org-account-container">
    <h2>Organization Account Management</h2>
    
    @if (session('success'))
        <div class="org-alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="org-alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <table class="org-table org-table-striped">
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
                        <div class="org-btn-group">
                            <a href="{{ route('faculty.orgs.edit', $organization->id) }}" class="org-btn org-btn-primary">✏️</a>
                            <a href="{{ route('faculty.orgs.remove', $organization->id) }}" class="org-btn org-btn-danger" onclick="return confirm('Are you sure you want to remove this organization?');">🗑️</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
