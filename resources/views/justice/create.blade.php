@extends('layouts.web')

@section('content')

@unless ($justiceType)
<section class="grid-x grid-margin-x grid-margin-y align-center">
    <header class="cell grid-x grid-margin-x">
        <h1 class="cell text-center">
            Create a DCJ
        </h1>
    </header>

    <main class="cell medium-10 large-8 grid-x grid-margin-y grid-padding-y">
        @include ('justice.nav', ['justiceType' => $justiceType, 'hideAllOption' => true ])
    </main>

    <footer class="cell grid-x align-center">
        <section class="cell medium-10 large-8 grid-x">
            <p class="cell">
                The Relevant Conflict Episode:
            </p>
            <a href="{{ route('conflict.show', $conflict) }}"
                class="cell">
                @include('conflict.title', $conflict)
            </a>
        </section>
    </footer>
</section>
@else
    <header class="cell grid-x grid-padding-y">
        <a href="{{ route('conflict.index') }}" class="cell shrink button hollow">
            Return to List of Conflict Episodes
        </a>

        <a href="{{ route('conflict.show', $conflict) }}" class="cell">
            @include('conflict.title')
        </a>

        <strong class="cell">
            Creating new {{ $justice->type }} DCJ
        </strong>
    </header>

    {{ Form::open(['route' => 'justice.store']) }}
        @include('forms.errors')

        <input type="hidden" name="type" value="{{ $justiceType }}" />
        <input type="hidden" name="conflict_id" value="{{ $conflict->id }}"/>

        <section class="cell">
            <main class="grid-x grid-padding-y">
                <section class="grid-x grid-margin-x grid-padding-y cell medium-9">
                    @include('justice.form')
                </section>
            </main>
        </section>

        <section class="cell">

            <button class="button">
                Save Changes to {{ ucfirst($justiceType) }} DCJ
            </button>
        </section>
    {{ Form::close() }}
@endunless

@endsection