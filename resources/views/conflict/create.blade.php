@extends('layouts.web')

@section('content')
<section class="cell">
    {{ Form::open(['route' => 'conflict.store']) }}
        @include('forms.errors')

        <main class="grid-x grid-padding-y">
            <section class="grid-x grid-margin-x grid-padding-y cell medium-9">
                <header class="cell text-center">
                    <strong>
                        Conflict 
                    </strong>
                </header>

                @include('conflict.form')
            </section>
        </main>

        <button class="button">
            Save Changes to Conflict
        </button>
    {{ Form::close() }}
</section>

@endsection