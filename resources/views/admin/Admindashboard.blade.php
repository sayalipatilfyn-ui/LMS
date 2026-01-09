@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Admin Dashboard</h3>

    <div class="card mt-3">
        <div class="card-body">
            <h5>Manage Users</h5>
            <h2>{{ $userCount }}</h2>
            <a href={{ route('admin.users') }}>View Users</a>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h5>Manage Cources</h5>
            <h2>{{ $courseCount }}</h2>
            <a href='#'>View Cources</a>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h5>Enrollements</h5>
            {{-- <h2>{{ $enrollemntCount }}</h2> --}}
            <a href='#'>View Users</a>
        </div>
    </div>
</div>
@endsection
