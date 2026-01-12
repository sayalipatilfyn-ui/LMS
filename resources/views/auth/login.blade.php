@extends('layouts.app')

@section('title', 'Login | MyLMS')

@section('content')

<section class="auth-page">
    <div class="auth-card">

        <h2>Login to Your Account</h2>
        <p class="auth-subtitle">Welcome back! Please login to continue</p>

        @if(session('error'))
            <p class="error-text">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

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

            <button href="{{ route('student.dashboard') }}" type="submit" class="btn-primary full-width">
                Login
            </button>
        </form>

        <div class="auth-links">
            <a href="#">Forgot Password?</a>
            <span>|</span>
            <a href="{{ route('register') }}">Create Account</a>
        </div>

    </div>
</section>

@endsection
