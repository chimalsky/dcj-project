@extends('layouts.web')

@section('content')

<section class="cell grid-x grid-margin-x grid-margin-y align-center">
    @can('create', 'App\Task')
    <header class="cell grid-x align-justify">
        <form data-controller="form"
            action="{{ route('task.index') }}"
            class="cell shrink">

            <input type="checkbox" data-action="change->form#submit" 
                name="user" value="{{ Auth::id() }}" 
                
                @if ($meOnly)
                    checked
                @endif
                /> Show only my Tasks
        </form>

        <a href="{{ route('task.create') }}" class="button hollow cell shrink">
            Assign Tasks
        </a>
    </header>
    @endcan

    <main class="cell medium-10 grid-x grid-margin-y">
        @include('task.list', $tasks)
    </main>

    @if ($tasks instanceof \Illuminate\Pagination\AbstractPaginator)
        {{ $tasks->links() }}
    @endif
</section>

@endsection