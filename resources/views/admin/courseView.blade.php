
@php use Illuminate\Support\Str; @endphp

@extends('layouts.app')

@section('title','Courses List')

@section('content')

<div>
    <h3>Courses</h3>

    <table class="users">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Created At</th>
            </tr>
        </thead>

        <tbody>
            @forelse($courses as $index => $course)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ Str::limit($course->description, 50) }}</td>
                    <td>{{ $course->category }}</td>
                    <td>₹{{ $course->price }}</td>
                    <td>{{ $course->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">No courses found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
