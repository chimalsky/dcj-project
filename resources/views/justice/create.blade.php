@extends('layouts.web')

@section('content')

<header class="cell grid-x grid-padding-y">
    @isset ($justice->type) 
    @else 
        <strong class="cell">
            Select type of DCJ
        </strong>
    @endisset
</header>

<section class="grid-x grid-margin-x grid-margin-y align-center">
    <main class="cell medium-10 large-8 grid-x grid-margin-y grid-padding-y">
        @include ('justice.nav', ['justiceType' => $justiceType, 'hideAllOption' => true ])
    </main>
</section>

@isset ($justiceType)
    {{ Form::open(['route' => ['justice.store', $conflict] ]) }}
        <section class="grid-x grid-padding-y align-center">
            <header class="grid-x grid-margin-x cell text-center">
                @include('forms.errors')

                <input type="hidden" name="type" value="{{ $justiceType }}" />
                <input type="hidden" name="conflict_id" value="{{ $conflict->id }}"/>
            </header>

            <main class="grid-x grid-margin-x grid-padding-y cell medium-10 large-8">
                @include('justice.form')
            </main>

            <footer class="cell grid-x grid-margin-x grid-margin-y grid-padding-y">
                <div class="cell grid-x align-center">
                    <button class="button">
                        Create this {{ ucfirst($justiceType) }} DCJ
                    </button>
                </div>
            </footer>
        </section>
    {{ Form::close() }}
@endisset

@endsection