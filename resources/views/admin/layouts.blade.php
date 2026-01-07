<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<header class="header">
    <div class="container">
        <h2 class="logo">Admin Panel</h2>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn-primary">Logout</button>
        </form>
    </div>
</header>

<main class="container" style="margin-top:40px;">
    @yield('content')
</main>

</body>
</html>
