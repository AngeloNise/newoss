@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/oamedit.css') }}">

<div class="org-account-container">
    <h2>Edit Organization Account</h2>

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

    <form action="{{ route('faculty.orgs.update', $organization->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="org_webmail">Org Webmail</label>
            <input type="email" id="org_webmail" name="email" class="form-control" value="{{ old('email', $organization->email) }}" required>
        </div>

        <div class="form-group">
            <label for="org_name">Org Name</label>
            <input type="text" id="org_name" name="name_of_organization" class="form-control" value="{{ old('name_of_organization', $organization->name_of_organization) }}" required>
        </div>

        <div class="form-group">
            <label for="head_name">Head Name</label>
            <input type="text" id="head_name" name="name" class="form-control" value="{{ old('name', $organization->name) }}" required>
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Leave blank if you do not want to change">
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm New Password</label>
            <input type="password" id="confirm_password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="org-btn org-btn-success">Save Changes</button>
        <a href="{{ route('faculty.orgs.index') }}" class="org-btn org-btn-secondary">Cancel</a>
    </form>
</div>

@endsection
