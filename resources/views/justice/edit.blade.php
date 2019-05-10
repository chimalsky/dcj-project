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

            @include('forms.errors')
        </header>

        <main class="grid-x grid-margin-x grid-padding-y cell medium-10 large-8">
            @include('justice.form')
        </main>

        <footer class="grid-x grid-margin-x grid-margin-y grid-padding-y">
            <div class="cell grid-x align-center">
                <button class="button cell shrink">
                    Save All Changes to {{ ucfirst($type) }} DCJ
                </button>
            </div>

            <div class="cell grid-x grid-padding-y grid-margin-y align-center">
                <a href="{{ route('conflict.show', $conflict) }}" class="button hollow cell shrink">
                    Cancel Changes without Saving
                </a>
            </div>
        </footer>
    </section>
{{ Form::close() }}

@endsection