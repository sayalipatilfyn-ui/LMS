<header class="header">
    <div class="container">
        <h1 class="logo">LMS</h1>

        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('courses') }}">Courses</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contact') }}">Contact</a>

            {{-- Guest --}}
            @guest
                <a href="{{ route('login') }}" class="btn">Login</a>
                <a href="{{ route('register') }}" class="btn">Register</a>
            @endguest

            {{-- Authenticated --}}
            @auth
                {{-- Admin --}}
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="btn">
                        Admin Dashboard
                    </a>
                @endif

                {{-- Instructor --}}
                @if(auth()->user()->role === 'instructor')
                    <a href="#" class="btn">
                        Instructor Dashboard
                    </a>
                @endif

                {{-- Student --}}
                @if(auth()->user()->role === 'student')
                    <a href="{{ route('student.dashboard') }}" class="btn">
                        {{ auth()->user()->name }}
                    </a>
                @endif

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button class="btn">Logout</button>
                </form>
            @endauth
        </nav>
    </div>
</header>
