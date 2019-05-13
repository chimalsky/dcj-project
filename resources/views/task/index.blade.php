@extends('layouts.web')

@section('content')

<main class="cell grid-x grid-margin-x grid-margin-y">
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

    @include('task.list', $tasks)

    @if ($tasks instanceof \Illuminate\Pagination\AbstractPaginator)
        {{ $tasks->links() }}
    @endif
</main>

@endsection