@extends('layout.adminlayout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/oam.css') }}">

<div class="org-account-container">
    <h2>Organization Account Management</h2>

    <!-- Display the Total Accounts -->
    <p class="total-count">
        <strong>Total:</strong> {{ $organizations->count() }} accounts
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
    <input type="text" id="searchBar" placeholder="Search by Organization Name, Person in Charge, Department or Webmail..." class="search-bar" onkeyup="filterOrganizations()">

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
                <tr class="org-table-row" data-name="{{ strtolower($organization->name_of_organization) }}" data-person="{{ strtolower($organization->name) }}" data-email="{{ strtolower($organization->email) }}" data-colleges="{{ strtolower($organization->colleges) }}">
                    <td>{{ $organization->name_of_organization }}</td>
                    <td>{{ $organization->name }}</td>
                    <td>{{ $organization->colleges }}</td>
                    <td>{{ $organization->email }}</td>
                    <td>
                        <!-- Dropdown for Status -->
                        <form action="{{ route('faculty.updateStatus', $organization->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()">
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
</div>

<script>
    function filterOrganizations() {
        const searchInput = document.getElementById('searchBar').value.toLowerCase();
        const organizations = document.querySelectorAll('.org-table-row');
        
        organizations.forEach(row => {
            const name = row.getAttribute('data-name');
            const person = row.getAttribute('data-person');
            const email = row.getAttribute('data-email');
            const colleges = row.getAttribute('data-colleges');
            
            if (name.includes(searchInput) || person.includes(searchInput) || email.includes(searchInput) || colleges.includes(searchInput)) {
                row.style.display = "table-row"; // Show matching row
            } else {
                row.style.display = "none"; // Hide non-matching row
            }
        });
    }
</script>

@endsection
