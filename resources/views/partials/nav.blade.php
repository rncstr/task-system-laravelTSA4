<header class="navbar">
    <div class="navbar-inner">
        <div class="nav-links">
            <a href="{{ route('welcome') }}" class="nav-brand">Tasks for Today</a>
            <a href="{{ route('welcome') }}" class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}">Welcome</a>
            <a href="{{ route('tasks.index') }}" class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}">Tasks</a>
            <a href="{{ route('public.profile') }}" class="nav-link {{ request()->routeIs('public.profile') ? 'active' : '' }}">Profile</a>
            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
        </div>

        <div class="nav-auth">
            @auth
                <span class="nav-user">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-ghost" style="padding: 5px 12px; font-size: 13px;">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="nav-link">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary" style="padding: 6px 12px; font-size: 13px;">Register</a>
            @endauth
        </div>
    </div>
</header>