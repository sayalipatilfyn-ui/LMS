@extends('layouts.app')

@section('title', 'Create Account | MyLMS')

@section('content')

<section class="auth-page">
    <div class="auth-card">

        <h2>Create Your Account</h2>
        <p class="auth-subtitle">Join MyLMS and start learning today</p>
         @if(session('success'))
                <p style="color: green; margin-bottom: 15px;">
                         {{ session('success') }}
                </p>
        @endif
        <form method="POST" action="{{ route('register.submit') }}">
            @csrf

            <input
                type="text"
                name="name"
                placeholder="Full Name"
                required
            >

            <input
                type="email"
                name="email"
                placeholder="Email Address"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                required
            >

            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirm Password"
                required
            >

            <button type="submit" class="btn-primary full-width">
                Create Account
            </button>
        </form>

        <div class="auth-links">
            <p>
                Already have an account?
                <a href="{{ route('login') }}">Login</a>
            </p>
        </div>

    </div>
</section>

@endsection
