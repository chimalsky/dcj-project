<section class="grid-x grid-margin-x align-middle grid-padding-y align-justify">
    <a href="{{ route('home') }}" class="cell shrink">
        The During Conflict Justice Project
    </a>

    <aside class="cell shrink grid-x grid-margin-x text-middle">
        @guest
            <a data-turbolinks="false" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else

            <p class="cell shrink">
                Hello, {{ Auth::user()->name }}
            </p>

            @can('create', 'App\Task')
                <a href="{{ route('task.index') }}" class="cell shrink">
                    Tasks
                </a>
            @else 
                <a href="{{ route('user.task.index', Auth::id()) }}" class="cell shrink">
                    My Tasks
                </a>
            @endcan

            @if (Auth::user()->role == 'admin')
                <a href="{{ route('user.index') }}" class="cell shrink">
                    Manage Users
                </a>
            @endif

            <a href="{{ route('justice.export') }}" class="cell shrink" data-turbolinks="false">
                Download Data
            </a>

            <a data-turbolinks="false"
                class="cell shrink" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }} 
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </aside>
</section>