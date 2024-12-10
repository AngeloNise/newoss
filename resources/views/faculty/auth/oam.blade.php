@extends('layout.adminlayout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/oam.css') }}">

<div class="org-account-container">
    <h2>Organization Account Management</h2>
    <a href="{{ route('faculty.orgs.create') }}" class="org-btn org-btn-primary">+ Add Account</a>
    <!-- Display the Total Accounts -->
    <br><p class="total-count">
        <strong>Total:</strong> {{ $organizations->total() }} accounts
    </p>
    
    <!-- Success and Error Alerts -->
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

    <!-- Search Bar -->
    <form method="GET" action="{{ route('faculty.orgs.index') }}" class="search-form">
        <input 
            type="text" 
            id="searchBar" 
            name="search" 
            value="{{ request()->get('search') }}" 
            placeholder="Search by Title or Colleges..." 
            class="search-bar">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <br>
    <!-- Organization Table -->
    <table class="org-table org-table-striped">
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Person in Charge</th>
                <th>Department</th>
                <th>Webmail</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="organizationsTable">
            @foreach ($organizations as $organization)
                <tr>
                    <td>{{ $organization->name_of_organization }}</td>
                    <td>{{ $organization->name }}</td>
                    <td>{{ $organization->colleges }}</td>
                    <td>{{ $organization->email }}</td>
                    <td>
                        <!-- Dropdown for Status -->
                        <form action="{{ route('faculty.updateStatus', $organization->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()" class="status-dropdown">
                                <option value="Without Deficiencies" {{ $organization->status == 'Without Deficiencies' ? 'selected' : '' }}>Without Deficiencies</option>
                                <option value="With Deficiencies" {{ $organization->status == 'With Deficiencies' ? 'selected' : '' }}>With Deficiencies</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <!-- Textbox for Remarks -->
                        <form action="{{ route('faculty.updateRemarks', $organization->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <textarea name="remarks" rows="1" class="remarks-textarea" placeholder="Add remarks...">{{ $organization->remarks }}</textarea>
                            <button type="submit" class="org-btn org-btn-secondary">💾 Save</button>
                        </form>
                    </td>                    
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

    <!-- Pagination Links -->
    <div class="pagination-container">
        {{ $organizations->appends(['search' => request()->get('search')])->links('pagination::simple-bootstrap-4') }}
    </div>    
</div>

@endsection
