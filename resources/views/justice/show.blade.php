@extends('layouts.web')

@section('content')

{{ Form::model($justice, [
    'route' => ['justice.update', $conflict->id, $justice->id], 
    'method' => 'put', 
    'data-controller' => 'form',
    'data-form-state' => 'disabled'
    ])
}}

    <section class="grid-x grid-padding-y align-center">
        <header class="grid-x grid-margin-x cell text-center">
            <strong class="cell">
                {{ $justice->type }} DCJ
            </strong>

            @isset ($justice->dcjid)
                <p class="cell">
                    <i>
                        Dcjid code in Excel: {{ $justice->dcjid }}
                    </i>
                </p>
            @endisset
        </header>
    


        <main class="grid-x grid-margin-x grid-padding-y cell medium-10">
            @include('justice.form')
        </main>
    </section>
{{ Form::close() }}


@endsection