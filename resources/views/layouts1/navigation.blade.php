<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <ul class="ml-auto navbar-nav" style="display: contents;position: sticky;top:0px;z-index: 2;" >
        @auth
            <li class="nav-item">
                <a class="nav-link" href="/dashboard" style="background-color: rgb(178, 244, 226); margin-left: 2rem;padding:0.2rem;border-radius: 3rem;">Dashboard</a>
            </li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();" class="nav-link" style="background-color: rgb(178, 244, 226); margin-left: 2rem;padding:0.2rem;border-radius:3rem;">
                    {{ __('Log Out') }}
                </a>
            </form>
        @else
            <li class="nav-item">
                <a class="nav-link btn btn-primary text-light p-0.2" href="{{ route('login') }}">Admin Log in</a>
            </li>
            {{-- @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endif --}}
        @endauth
    </ul>
</nav>
