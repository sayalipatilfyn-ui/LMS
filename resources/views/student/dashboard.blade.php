@extends('layouts.app')

@section('title', 'Student Dashboard | LMS')

@section('content')

<section class="dashboard">
    <div class="container">

        <!-- Welcome -->
        <div class="dashboard-header">
            <div>
                <h2>Welcome back, {{ auth()->user()->name }} 👋</h2>
                <p>Continue your learning journey</p>
            </div>
            <a href="{{ route('courses') }}" class="btn-primary">
                Browse Courses
            </a>
        </div>

        <!-- Stats -->
        <div class="grid dashboard-stats">
            <div class="card stat-card">
                <h3>📚 My Courses</h3>
                <p class="stat-number">{{ $totalCourses }}</p>
                <span>Enrolled</span>
            </div>

            <div class="card stat-card">
                <h3>Completed</h3>
                <p class="stat-number">{{ $completed }}</p>
            </div>

            <div class="card stat-card">
                <h3>⏳ In Progress</h3>
                <p class="stat-number">{{ $inProgress }}</p>
            </div>
        </div>
        <br>
        
        <!-- In Progress Courses ONLY -->
        <div class="dashboard-section">
            <h3>Courses In Progress</h3>

            <div class="grid">
                @forelse($inProgressCourses as $enroll)
                    @php
                        $percentage = $progress
                            ->where('course_id', $enroll->course_id)
                            ->first()
                            ->percentage ?? 0;
                    @endphp

                    <div class="course-card">
                        <h4>{{ $enroll->course->title }}</h4>

                        <p class="course-meta">
                            {{ ucfirst($enroll->course->category) }}
                        </p>

                        <div class="progress-info">
                            <span>Progress</span>
                            <span>{{ $percentage }}%</span>
                        </div>
                        <br>
                        <div class="progress-bar">
                            <span style="width: {{ $percentage }}%"></span>
                        </div>

                        <a href="#" class="btn-primary full-width">
                            Continue Learning
                        </a>
                    </div>
                @empty
                    <p>No courses currently in progress.</p>
                @endforelse
            </div>
        </div>

        <br>
        <!-- Quick Actions -->
        <div class="dashboard-section">
            <h3>Quick Actions</h3>
            <br>
            <div class="grid quick-actions">
                <div class="card action-card">
                    <a href="{{ route('courses') }}">📖 Browse Courses</a>
                </div>
                <div class="card action-card">
                    <a href="#">🏆 Download Certificates</a>
                </div>
                <div class="card action-card">
                    <a href="{{ route('student.edit') }}">👤 Edit Profile</a>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
