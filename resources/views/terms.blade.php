@extends('layouts.app')

@section('title', 'Terms and Conditions')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Terms and Conditions</h3>
        </div>
        <div class="card-body">
            <p>Welcome to our To-Do List application. By using our services, you agree to the following terms and conditions:</p>

            <h5>1. Acceptance of Terms</h5>
            <p>By accessing or using our application, you agree to comply with these terms.</p>

            <h5>2. User Responsibilities</h5>
            <p>You are responsible for maintaining the confidentiality of your account and password.</p>

            <h5>3. Prohibited Activities</h5>
            <p>You may not use our service for any unlawful or unauthorized purpose.</p>

            <h5>4. Changes to Terms</h5>
            <p>We reserve the right to update these terms at any time.</p>

            <h5>5. Contact Information</h5>
            <p>If you have any questions about these Terms, please contact us at <a href="mailto:support@example.com">support@example.com</a>.</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('register') }}" class="btn btn-primary">Back to Registration</a>
        </div>
    </div>
</div>
@endsection
