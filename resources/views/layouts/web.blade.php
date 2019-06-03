<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            {{ config('app.name') }}
        </title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        @stack('stylesheets')
        
        <script src="{{ mix('js/app.js') }}" defer="true"></script>
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
                <aside class="cell grid-x grid-margin-x align-top">
                    <p class="cell medium-shrink">
                        Results for <strong>{{ $query }}</strong>
                    </p>
                    <a href="{{ route(route::currentRouteName()) }}" class="cell medium-shrink">
                        Clear Search
                    </a>
                </aside>
            @endisset

            @if (session('status'))
                @if ( is_array(session('status')) )
                    @foreach (session('status') as $status)
                        @include('session.status')
                    @endforeach
                @else
                    @include('session.status', ['status' => session('status')])
                @endif
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
