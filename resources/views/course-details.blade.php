@extends('layouts.app')

@section('title', $course->title)

@section('content')
<section class="courses-page">
    <div class="container">
        <h1>{{ $course->title }}</h1>
        <p>{{ $course->description }}</p>

        <p><strong>Category:</strong> {{ ucfirst($course->category) }}</p>
        <p><strong>Price:</strong>
            {{ $course->price > 0 ? '₹'.$course->price : 'Free' }}
        </p>

        <a href="{{ route('enroll', $course->id) }}" class="btn-primary">
            Enroll Now
        </a>
    </div>
</section>
@endsection
