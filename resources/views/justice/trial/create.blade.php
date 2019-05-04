@extends('layouts.web')

@section('content')
<section class="cell">
    {{ Form::open(['route' => 'history.store']) }}
        @include('forms.errors')

        <main class="grid-x grid-padding-y">
            <section class="grid-x grid-margin-x grid-padding-y cell medium-9">
                <header class="cell text-center">
                    <strong>
                        Date
                    </strong>
                </header>

                @include('history.form')
            </section>
        </main>

        <button class="button">
            Save Changes to Dates
        </button>
    {{ Form::close() }}
</section>

<section class="cell">
    {{ Form::open(['route' => 'trial.store']) }}
        @include('forms.errors')

        <main class="grid-x grid-padding-y">
            <section class="grid-x grid-margin-x grid-padding-y cell medium-9">
                <header class="cell text-center">
                    <strong>
                        Trial   
                    </strong>
                </header>

                @include('justice.trial.form')
            </section>
        </main>

        <button class="button">
            Save Changes to Trial
        </button>
    {{ Form::close() }}
</section>

@endsection