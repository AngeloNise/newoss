@extends('layout.adminlayout')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/faculty/oamcreate.css') }}">

<div class="org-account-container">
    <h2>Add New Organization Account</h2>

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

    <!-- Add Account Form -->
    <form method="POST" action="{{ route('faculty.orgs.store') }}" autocomplete="off">
        @csrf
        <div class="split">
            <div class="form-group">
                <label for="colleges">Colleges</label>
                <input type="text" name="colleges" id="colleges" class="form-control">
            </div>

            <div class="form-group">
                <label for="name">Person in Charge</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
        </div>

        <div class="split">
            <div class="form-group">
                <label for="name_of_organization">Organization Name</label>
                <input type="text" name="name_of_organization" id="name_of_organization" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Webmail</label>
                <input type="email" name="email" id="email" class="form-control" required autocomplete="off">
            </div>
        </div>

        <div class="split">
            <div class="form-group password-container">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required autocomplete="new-password">
                <!-- Show/Hide icon for password -->
                <i id="togglePassword" class="fas fa-eye toggle-icon"></i>
            </div>

            <div class="form-group password-container">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">
            </div>
        </div>

        <button type="submit" class="org-btn org-btn-primary">Add Account</button>
    </form>
</div>

<script>
    // JavaScript to handle live password update
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the form fields
        const nameField = document.getElementById('name');
        const emailField = document.getElementById('email');
        const passwordField = document.getElementById('password');
        const passwordConfirmationField = document.getElementById('password_confirmation');
        const togglePassword = document.getElementById('togglePassword');

        // Function to generate the password dynamically
        function generatePassword() {
            // Get first word of the name and first 5 characters of the email prefix
            const name = nameField.value.split(' ')[0].toLowerCase();
            const email = emailField.value.split('@')[0].toLowerCase().slice(0, 5);
            const generatedPassword = name + email + '@PUP';

            // Set the password field value to the generated password
            passwordField.value = generatedPassword;
            passwordConfirmationField.value = generatedPassword; // Also set the confirmation password
        }

        // Event listeners to update password on name or email change
        nameField.addEventListener('input', generatePassword);
        emailField.addEventListener('input', generatePassword);

        // Show/Hide password toggle functionality
        togglePassword.addEventListener('click', function () {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            passwordConfirmationField.type = type; // Also change the confirmation field
            togglePassword.classList.toggle('fa-eye-slash');  // Toggle icon
        });
    });
</script>

@endsection
