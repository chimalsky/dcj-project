@extends('layouts.web')

@section('content')
    {{ Form::open(['route' => 'task.store']) }}
        <section data-controller="form">
            {{ Form::label('conflict series') }}
            <auto-complete src="{{ route('conflict-series.search') }}" aria-owns="conflict-series-popup">
                <input type="text" name="conflict_series">
                <ul id="conflict-series-popup"></ul>
            </auto-complete>
        </section>

        {{ Form::label('team member') }}
        {{ Form::select('user', $users) }}

        <button class="button">
            Assign This Task 
        </button>
    {{ Form::close() }}
@endsection