@extends('layouts.web')

@section('content')

<header class="cell grid-x grid-padding-y">
    <a href="{{ route('conflict.index') }}" class="cell shrink button hollow">
        Return to List of Conflict Episodes
    </a>

    <a href="{{ route('conflict.show', $conflict) }}" class="cell">
        @include('conflict.title')
    </a>

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
</header>

{{ Form::model($justice, ['route' => ['justice.update', $justice->id], 'method' => 'put']) }}
    @include('forms.errors')

    <section class="cell">
        <main class="grid-x grid-padding-y">
            <section class="grid-x grid-margin-x grid-padding-y cell medium-9">
                @include('justice.form')
            </section>
        </main>
    </section>

    <section class="cell">
        <footer class="grid-x grid-margin-x align-justify">
            <button class="button cell shrink">
                Save All Changes to {{ ucfirst($type) }} DCJ
            </button>

            <a href="{{ route('conflict.show', $conflict) }}" class="button hollow cell shrink">
                Cancel Changes without Saving
            </a>
        </footer>
    </section>
{{ Form::close() }}

@endsection