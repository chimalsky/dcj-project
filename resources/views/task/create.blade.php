@extends('layouts.web')

@section('content')
    {{ Form::open(['route' => 'task.store']) }}

        <button class="button">
            Assign This Task 
        </button>
    {{ Form::close() }}
@endsection