@extends('layouts.web')

@section('content')

<header class="cell grid-x grid-padding-y">

</header>

{{ Form::model($justice, ['route' => ['justice.update', $conflict->id, $justice->id], 'method' => 'put']) }}

    <section class="grid-x grid-padding-y align-center">
        <header class="grid-x grid-margin-x cell text-center">
            <strong class="cell">
                Editing {{ $justice->type }} DCJ
            </strong>

            @isset ($justice->dcjid)
                <p class="cell">
                    <i>
                        Dcjid code in Excel: {{ $justice->dcjid }}
                    </i>
                </p>
            @endisset

            <input type="hidden" name="task" value ="{{ isTaskWorkflow() }}" />
            @include('forms.errors')
        </header>

        <main class="grid-x grid-margin-x grid-padding-y cell medium-10">
            @include('justice.form')
        </main>

        <footer class="grid-x grid-margin-x grid-margin-y grid-padding-y">
            <div class="cell grid-x align-center">
                <button class="button cell shrink">
                    Save All Changes to {{ ucfirst($type) }} DCJ
                </button>
            </div>

            <div class="cell grid-x grid-padding-y grid-margin-y align-center">
                <a href="{{ route('conflict.show', ['conflict' => $conflict->id, 'task' => isTaskWorkflow()]) }}" class="button hollow cell shrink">
                    Cancel Changes without Saving
                </a>
            </div>
        </footer>
    </section>
{{ Form::close() }}

<form action="{{ route('justice.destroy', ['conflict' => $conflict->id, 'justice' => $justice->id, 'task' => isTaskWorkflow()]) }}"
    method="post"
    data-controller="form"
    class="cell grid-x grid-padding-y grid-margin-y align-center">
    @csrf 
    @method('delete')

    <button class="button alert cell shrink" data-action="form#delete">
        Delete this DCJ
    </button>
</form>

@endsection