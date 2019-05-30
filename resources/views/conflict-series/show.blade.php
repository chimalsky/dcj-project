@extends('layouts.web')

@section('content')

<section class="grid-x grid-margin-y grid-padding-y align-center"
    data-sticky-container>
    
    <main class="cell grid-x grid-margin-x grid-margin-y grid-padding-y">
        @foreach ($conflictYears as $conflict)
            @if ($conflict->dyads->count() > 1)
                @include('conflict.group', ['conflict' => $conflict])
            @else
                @include('conflict.card', ['conflict' => $conflict, 'cssClass' => 'cell medium-6 large-4'])
            @endif
        @endforeach
    </main>
</section>
@endsection