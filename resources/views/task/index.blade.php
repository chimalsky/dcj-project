@extends('layouts.web')

@section('content')

<section class="cell grid-x grid-margin-x grid-margin-y align-center">
    <header class="cell grid-x align-justify">
        <form data-controller="form"
            action="{{ route('task.index') }}"
            class="cell shrink grid-x grid-margin-x">

            @can('create', 'App\Task')
                <div class="cell medium-shrink">
                    <input type="checkbox" data-action="change->form#submit" 
                        name="user" value="{{ Auth::id() }}" 
                        
                        @if ($meOnly)
                            checked
                        @endif
                        /> Show only my Tasks
                </div>
            @endcan

            <div class="cell medium-shrink">
                <input type="checkbox" data-action="change->form#submit" 
                    name="status" value="outstanding" 
                    
                    @if ($status)
                        checked
                    @endif
                    /> Show only unfinished tasks
            </div>
        </form>

        <a href="{{ route('task.create') }}" class="button hollow cell shrink">
            Assign Tasks
        </a>
    </header>

    <main class="cell medium-10 grid-x grid-margin-y">
        @include('task.list', $tasks)
    </main>

    @if ($tasks instanceof \Illuminate\Pagination\AbstractPaginator)
        {{ $tasks->links() }}
    @endif
</section>

@endsection