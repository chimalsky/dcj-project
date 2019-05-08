@extends('layouts.web')

@section('content')

<section class="grid-x grid-margin-y grid-padding-y cell align-center">
    @foreach ($conflicts as $conflict)
        <article class="cell large-9">
            @include('conflict.item', ['conflict' => $conflict])
        </article>
    @endforeach
</section>

{{ $conflicts->links() }}
@endsection