@extends('layouts.web')

@section('content')
{{ $trials->links() }}

@foreach ($trials as $trial)
    <p>
        {{ $trial }}

        {{ $trial->justice->coding_notes }}
    </p>

@endforeach

@endsection