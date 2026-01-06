@extends('layouts.app')

@section('title', 'About Us | LMS')

@section('content')

<!-- Hero Section -->
<section class="about-hero">
    <div class="container">
        <h1>About LMS</h1>
        <p>Empowering learners with skills for the future</p>
    </div>
</section>

<!-- About Content -->
<section class="about-content">
    <div class="container two-column">
        <div>
            <h2>Who We Are</h2>
            <p>
                MyLMS is an online learning platform designed to help students,
                professionals, and instructors connect through high-quality,
                practical courses. We focus on real-world skills that help you
                grow in your career.
            </p>
            <p>
                Our platform supports flexible learning, expert instructors,
                certifications, and progress tracking — all in one place.
            </p>
        </div>

        <div>
            <h2>Our Mission</h2>
            <p>
                To make quality education accessible, affordable, and effective
                for everyone, everywhere.
            </p>

            <h2>Our Vision</h2>
            <p>
                To become a trusted global learning platform that transforms
                careers through skill-based education.
            </p>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="why-us">
    <div class="container">
        <h2>Why Choose MyLMS?</h2>

        <div class="grid">
            <div class="card">
                <h3>Expert Instructors</h3>
                <p>Courses taught by industry professionals</p>
            </div>
            <div class="card">
                <h3>Flexible Learning</h3>
                <p>Learn anytime, at your own pace</p>
            </div>
            <div class="card">
                <h3>Certified Courses</h3>
                <p>Earn certificates that add value to your career</p>
            </div>
            <div class="card">
                <h3>Affordable Pricing</h3>
                <p>High-quality education at reasonable cost</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats">
    <div class="container grid">
        <div class="stat-box">
            <h3>10K+</h3>
            <p>Students</p>
        </div>
        <div class="stat-box">
            <h3>500+</h3>
            <p>Courses</p>
        </div>
        <div class="stat-box">
            <h3>100+</h3>
            <p>Instructors</p>
        </div>
        <div class="stat-box">
            <h3>95%</h3>
            <p>Success Rate</p>
        </div>
    </div>
</section>

@endsection
