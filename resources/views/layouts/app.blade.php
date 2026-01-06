<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'LMS')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

@include('layouts.header')

<main>
    @yield('content')
</main>

@include('layouts.footer')

</body>
</html>
