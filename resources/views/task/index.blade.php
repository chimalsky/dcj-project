@extends('layouts.web')

@section('content')

<main class="cell grid-x grid-margin-x grid-margin-y">
    @include('task.list', $tasks)
</main>

@endsection