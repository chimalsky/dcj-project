<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            {{ config('app.name') }}
        </title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @stack('stylesheets')
        
        <script src="{{ asset('js/app.js') }}" defer="true"></script>
        @stack('scripts')
    </head>
    <body data-controller="application">
        <header class="web">
            <section class="web-layouts grid-container">
                @include('layouts.header')
            </section>

            <section class="grid-container grid-x">
                <nav class="cell grid-x grid-margin-x align-center align-middle breadcrumbs">
                    {{ Breadcrumbs::render() }}
                </nav>
            </section>
            
            @yield('header')
        </header>

        <main class="web grid-container grid-x grid-margin-y">
            @isset ($query)
                <aside class="cell grid-x">
                    <p class="cell medium-auto">
                        Results for <strong>{{ $query }}</strong>
                    </p>

                    <form action="{{ route('conflict.index') }}"
                        class="cell medium-shrink grid-x grid-margin-x align-middle">
                        
                        <input type="text" name="query" placeholder="UCDP Conflict Years" 
                            class="cell auto" />
                        <button class="button hollow cell shrink">
                            Search 
                        </button>
                    </form>
                </aside>
            @endisset

            @if (session('status'))
                <div class="callout success cell">
                    {{ session('status') }}
                </div>
            @endif

            <section class="cell callout" id="content">
                @yield('content')
            </main>
        </main>

        <footer class="web">
            <footer class="web-layouts grid-container">
                @include('layouts.footer')
            </footer>

            @yield('footer')
        </footer>
    </body>
</html>
