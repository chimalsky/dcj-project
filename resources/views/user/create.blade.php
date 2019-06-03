@extends('layouts.web')

@section('content')

<section class="grid-x align-center">
    {{ Form::open(['route' => 'user.store']) }}
        @include('forms.errors')
    
        <main class="grid-x grid-padding-y">
            {{ Form::label('name') }}
            {{ Form::text('name') }}

            {{ Form::label('email') }}
            {{ Form::email('email') }}

            {{ Form::label('role') }}
            {{ Form::select('role', ['coder' => 'coder', 'admin' => 'admin']) }}
        </main>

        <footer class="grid-x align-center">
            <button class="button shrink hollow cell">
                Add Crew member
            </button>
        </footer>
    {{ Form::close() }}
</section>

@endsection