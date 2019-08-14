@extends('layouts.web')

@section('content')

<section class="cell grid-x grid-margin-x grid-margin-y align-center"
    data-task-list-status="{{ $status }}">
    <header class="cell grid-x align-justify">
        @can('create', 'App\Task')
            <div class="cell medium-shrink">
                <a href="{{ route('user.task.index', Auth::user()) }}" class="button">
                    Show only my Tasks
                </a>
            </div>
        @endcan

        <form data-controller="form"
            action="{{ route('task.index') }}"
            class="cell shrink grid-x grid-margin-x align-middle">

            @include('task.query')
        </form>

        @can('create', 'App\Task')
            <a href="{{ route('task.create') }}" class="button hollow cell shrink">
                Assign Tasks
            </a>
        @endcan


    </header>

    <main class="cell medium-10 grid-x grid-margin-y">
        @if (!$viewType)
            @foreach($tasks->pluck('conflictSeries.region')->unique() as $region)
                <a class="cell" href="{{ route('task.index', ['region' => $region]) }}"> 
                    <h1>
                        {{ $region }}
                    </h1>
                </a>

                @include('task.list', ['tasks' => $tasks->where('conflictSeries.region', $region)])
            @endforeach
        @elseif ($viewType == 'user')
            @foreach ($users as $user) 
                {{ $user }}
            @endforeach
        @else 
            {{ $tasks }}
        @endif
    </main>

    <footer class="grid-x cell">
        <nav class="callout" style="position:fixed; bottom:0;">
            @if (Request::query('region'))
                Showing only tasks in {{ Request::query('region') }}
            @endif

            {{ $tasks->links() }}
        </nav>
    </footer>
</section>

@endsection