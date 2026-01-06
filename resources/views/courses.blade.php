@extends('layouts.app')

@section('title', 'Courses | MyLMS')

@section('content')

<section class="courses-hero">
    <div class="container">
        <h1>Our Courses</h1>
        <p>Explore skill-based courses designed for your career growth</p>
    </div>
</section>

<section class="courses-page">
    <div class="container">

        <!-- Filter -->
        <form method="GET" action="{{ route('courses') }}" class="course-filter">
            <input
                type="text"
                name="search"
                placeholder="Search courses..."
                value="{{ request('search') }}"
            >

            <select name="category">
                <option value="all">All Categories</option>
                <option value="programming" {{ request('category')=='programming'?'selected':'' }}>Programming</option>
                <option value="frontend" {{ request('category')=='frontend'?'selected':'' }}>Frontend</option>
                <option value="database" {{ request('category')=='database'?'selected':'' }}>Database</option>
                <option value="design" {{ request('category')=='design'?'selected':'' }}>Design</option>
            </select>

            <button class="btn-primary">Filter</button>
        </form>

        <!-- Courses -->
        <div class="grid">
            @forelse($courses as $course)
                <div class="course-card">
                    <h3>{{ $course->title }}</h3>
                    <p>{{ $course->description }}</p>
                    <span class="badge">{{ ucfirst($course->category) }}</span>

                    <div class="course-footer">
                        <span class="price">
                            {{ $course->price > 0 ? '₹'.$course->price : 'Free' }}
                        </span>
                       <a href="{{ route('enroll', $course->id) }}" class="btn-primary">
                                Enroll Course
                      </a>

                    </div>
                </div>
            @empty
                <p style="color:red">No courses found.</p>
            @endforelse
        </div>

    </div>
</section>

@endsection
