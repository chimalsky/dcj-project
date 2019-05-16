@extends('layouts.web')

@section('content')

<section class="cell grid-x grid-margin-x grid-margin-y align-center"
    data-task-list-status="{{ $status }}">
    <header class="cell grid-x align-justify">
        <form data-controller="form"
            action="{{ route('task.index') }}"
            class="cell shrink grid-x grid-margin-x align-middle">

            @can('create', 'App\Task')
                <div class="cell medium-shrink">
                    <input type="checkbox" data-action="change->form#submit" 
                        name="user" value="{{ Auth::id() }}" 
                        
                        @if ($meOnly)
                            checked
                        @endif
                        /> Show only my Tasks
                </div>

                @unless ($meOnly)
                    <div class="cell medium-shrink">
                        <input type="checkbox" data-action="change->form#submit" 
                            name="view_type" value="user" 
                            
                            @if ($users || !isset($users))
                                checked
                            @endif
                            /> Organize Tasks by Coder
                    </div>
                @endunless
            @endcan

            <div class="cell medium-shrink">
                <select name="status" data-action="change->form#submit">
                    <option value="all" @if($status == 'all') selected @endif>
                        All Tasks
                    </option>
                    <option value="0" @if($status == '0') selected @endif>
                        Tasks in Progress
                    </option>
                    <option value="1" @if($status == 1) selected @endif>
                        Completed Tasks
                    </option>
                </select>
            </div>
        </form>

        @can('create', 'App\Task')
            <a href="{{ route('task.create') }}" class="button hollow cell shrink">
                Assign Tasks
            </a>
        @endcan
    </header>

    <main class="cell medium-10 grid-x grid-margin-y">
        @if (isset($users))
            @include('user.task.list', $users)
        @else
            @include('task.list', $tasks)
        @endif
    </main>

    @if ($tasks instanceof \Illuminate\Pagination\AbstractPaginator)
        <footer class="cell grid-x align-center">
            {{ $tasks->links() }}
        <footer>
    @endif
</section>

@endsection