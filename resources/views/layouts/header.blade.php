<section class="grid-x grid-margin-x align-middle grid-padding-y">
    <nav class="cell auto grid-x grid-margin-x align-middle breadcrumbs">
        <a href="{{ route('conflict.index') }}" class="cell shrink">
            Conflict Episodes
        </a>

        @isset ($conflict)
            <span class="cell shrink"> 
                >
            </span>

            <a href="{{ route('conflict.show', $conflict) }}"
                class="cell shrink">
                {{ $conflict->year }} -- {{ $conflict->location }}
            </a>
        @endisset

        @isset ($justice)
            <span class="cell shrink"> 
                >
            </span>

            @isset ($justice->id)
                <a href="{{ route('justice.edit', $justice) }}"
                    class="cell shrink">
                    {{ ucfirst($justice->type) }} # {{ $justice->count }}
                </a>
            @else
                <a class="cell shrink">
                    Create DCJ
                </a>
            @endisset
        @endisset
    </nav>

    <aside class="cell shrink grid-x grid-margin-x">
        @guest
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <a id="navbarDropdown" class="cell shrink nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Hello, {{ Auth::user()->name }}
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