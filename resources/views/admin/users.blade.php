@extends('layouts.app')

@section('title','Registered Users')

@section('content')

<div>
    <h3>Registered Users</h3>

    <table class='users'>
        <thead >
            <tr>
                <th>sr.no</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registered At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <td data-label="Sr. No">{{ $index + 1 }}</td>
                <td data-label="Name">{{ $user->name }}</td>
                <td data-label="Email">{{ $user->email }}</td>
                <td data-label="Registered At">{{ $user->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection