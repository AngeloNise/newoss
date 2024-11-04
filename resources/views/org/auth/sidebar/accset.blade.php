@extends('layout.orglayout')
@section('content')
    <link rel="stylesheet" href="/css/orgs/accset.css">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="container">
    <div class="profile-header">
        <div class="details">
            <h3>{{ $user->name_of_organization}}</h3>
            <p>PRESIDENT</p>
            <p>{{ $user->name }}</p>
        </div>

    </div>

    <div class="form-container-accset">
        <form action="{{ route('accset.update') }}" method="POST">
            @csrf
    
            <div class="form-layout">
                <!-- Left Column -->
                <div class="form-left">
                    <div class="form-accset">
                        <label for="name" class="form-label">President Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>
    
                    <div class="form-accset">
                        <input type="text" class="form-control" id="organization" name="organization" value="{{ old('name_of_organization', $user->name_of_organization) }}" placeholder="Organization Name" required>
                    </div>
                </div>
    
                <!-- Right Column -->
                <div class="form-right">
                    <div class="form-accset">
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password" required>
                    </div>
    
                    <div class="form-accset">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                    </div>
    
                    <div class="form-accset">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                    </div>
                </div>
            </div>
    
            <!-- Submit Button -->
            <div class="buttons">
                <button type="submit" class="btn btn-success">Save Changes</button>
            </div>
        </form>
    </div>
    
</div>
@endsection
