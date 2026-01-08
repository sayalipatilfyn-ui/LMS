@extends('layouts.app')

@section('title', 'Enrollment Successful')

@section('content')

<section class="auth-page">
    <div class="auth-card">
        <h2>🎉 Enrollment Successful!</h2>
        <p>You have been successfully enrolled in the course.</p><br><br>

        <a href="{{ route('courses') }}" class="btn-primary full-width">
            More Courses
        </a><br><br>
<br>
        <a href="{{ route('student.dashboard') }}" class="btn-primary full-width">
            My Courses
        </a>
    </div>
</section>

@endsection
