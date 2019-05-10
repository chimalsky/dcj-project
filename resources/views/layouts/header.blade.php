<section class="grid-x grid-margin-x align-middle grid-padding-y align-justify">
    <a href="{{ route('home') }}" class="cell shrink">
        The During Conflict Justice Project
    </a>

    <aside class="cell shrink grid-x grid-margin-x">
        @guest
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <p id="navbarDropdown" class="cell shrink nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Hello, {{ Auth::user()->name }}
            </p>

            <a href="{{ route('task.index') }}" class="cell shrink">
                My Tasks
            </a>

            @if (Auth::user()->role == 'admin')
                <a href="{{ route('user.index') }}" class="cell shrink">
                    Manage Users
                </a>
            @endif

            <div class="hide dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endguest
    </aside>
</section>