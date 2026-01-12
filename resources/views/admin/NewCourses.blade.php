@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title','Add Course')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Add New Course</h4>
        </div>

         @if(session('success'))
                <p style="color: green; margin-bottom: 15px;">
                         {{ session('success') }}
                </p>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('admin.addCourses') }}">
                @csrf

                {{-- Course Title --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Course Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        placeholder="Enter course title"
                        required
                    >
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Course Description --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Enter course description"
                        required
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Category --}}
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input
                        type="text"
                        name="category"
                        id="category"
                        class="form-control @error('category') is-invalid @enderror"
                        value="{{ old('category') }}"
                        placeholder="e.g. Web Development"
                        required
                    >
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Price --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Price (₹)</label>
                    <input
                        type="number"
                        name="price"
                        id="price"
                        class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price') }}"
                        placeholder="Enter course price"
                        step="0.01"
                        min="0"
                        required
                    >
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        Add Course
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
