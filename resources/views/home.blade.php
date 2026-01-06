@extends('layouts.app')

@section('title', 'Home | LMS')

@section('content')

<section class="hero">
    <div class="container">
        <h2>Learn Anytime, Anywhere</h2>
        <p>Upgrade your skills with expert-led online courses</p><br><br>
        <a href="#" class="btn-primary">Browse Courses</a>
    </div>
</section>

<section class="features">
    <div class="container grid">
        <div class="card">
            <h3>Expert Instructors</h3>
            <p>Learn from industry professionals</p>
        </div>
        <div class="card">
            <h3>Flexible Learning</h3>
            <p>Study at your own pace</p>
        </div>
        <div class="card">
            <h3>Certificates</h3>
            <p>Get certified after course completion</p>
        </div>
    </div>
</section>

<section class="courses">
    <div class="container">
        <h2>Popular Courses</h2>
        <div class="grid">
            <div class="course-card">
                <h4>Laravel for Beginners</h4>
                <p>Build real-world applications</p>
            </div>
            <div class="course-card">
                <h4>React Masterclass</h4>
                <p>Frontend development from scratch</p>
            </div>
            <div class="course-card">
                <h4>Database Design</h4>
                <p>MySQL & performance tuning</p>
            </div>
        </div>
    </div>
</section>

@endsection
