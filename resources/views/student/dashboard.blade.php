@extends('layouts.app')

@section('title', 'Student Dashboard | LMS')

@section('content')

<section class="dashboard">
    <div class="container">

        <!-- Welcome -->
        <div class="dashboard-header">
            <h2>Welcome, {{ auth()->user()->name }} 👋</h2>
            <p>Continue your learning journey</p>
        </div>

        <!-- Stats -->
        <div class="grid dashboard-stats">
            <div class="card">
                <h3>My Courses</h3>
                <p>3 Enrolled</p>
            </div>
            <div class="card">
                <h3>Completed</h3>
                <p>1 Course</p>
            </div>
            <div class="card">
                <h3>In Progress</h3>
                <p>2 Courses</p>
            </div>
        </div>

        <!-- My Courses -->
        <div class="dashboard-section">
            <h3>My Courses</h3>

            <div class="grid">
                <div class="course-card">
                    <h4>Laravel for Beginners</h4>
                    <p>Progress: 70%</p>
                    <div class="progress-bar">
                        <span style="width:70%"></span>
                    </div>
                    <a href="#" class="btn-primary">Continue</a>
                </div>

                <div class="course-card">
                    <h4>React Masterclass</h4>
                    <p>Progress: 40%</p>
                    <div class="progress-bar">
                        <span style="width:40%"></span>
                    </div>
                    <a href="#" class="btn-primary">Continue</a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="dashboard-section">
            <h3>Quick Actions</h3>

            <div class="grid">
                <div class="card">
                    <a href="{{ route('courses') }}">Browse Courses</a>
                </div>
                <div class="card">
                    <a href="#">Download Certificates</a>
                </div>
                <div class="card">
                    <a href="#">Edit Profile</a>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
