<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Browse
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a href="/threads" class="dropdown-item">All Threads</a>
                        @if (auth()->check())
                            <a href="/threads?by={{ auth()->user()->username }}" class="dropdown-item">My Threads</a>
                        @endif
                        <a href="/threads?popular=1" class="dropdown-item">Popular Threads</a>
                        <a href="/threads?unanswered=1" class="dropdown-item">Unanswered Threads</a>
                    </div>
                </li>
                <li class="navbar-item">
                    <a href="/threads/create" class="nav-link">New Thread</a>
                </li>
                
                <channel-dropdown></channel-dropdown>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    
                    <user-notifications></user-notifications>

                    @if (Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a href="/admin" class="nav-link">
                                <span class="oi oi-cog" aria-hidden="true"></span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profiles', Auth::user()) }}">My Profile</a>
                            <logout-button route="{{ route('logout') }}">Logout</logout-button>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>