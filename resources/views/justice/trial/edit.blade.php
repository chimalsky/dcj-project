@extends('layouts.web')

@section('content')
<section class="cell">
    {{ Form::model( $trial->justice, [
        'route' => ['justice.update', $trial->justice->id],
        'method' => 'put'
        ]) 
    }}
        @include('forms.errors')

        <main class="grid-x grid-padding-y">
            <section class="grid-x grid-margin-x grid-padding-y cell medium-9">
                <header class="cell text-center">
                    <strong>
                        Date
                    </strong>
                </header>

                @include('justice.form', ['justice' => $trial->justice])
            </section>
        </main>

        <button class="button">
            Save Changes to Justice
        </button>
    {{ Form::close() }}
</section>

<section class="cell">
    {{ Form::model( $trial, [
        'route' => ['trial.update', $trial->id],
        'method' => 'put'
        ]) 
    }}
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