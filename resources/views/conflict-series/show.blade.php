@extends('layouts.web')

@section('content')

<section class="grid-x grid-margin-y grid-padding-y align-center"
    data-sticky-container>
    
    <main class="cell grid-x grid-margin-x grid-margin-y grid-padding-y">
        @foreach ($conflictSeries->episodes as $conflictYear)
                @if ($conflictYear->dyads->count() > 1)
                    @include('conflict.group', ['conflict' => $conflictYear])
                @else
                    @include('dyadic-conflict.card', ['conflict' => $conflictYear->dyads->first(), 'cssClass' => 'cell medium-6 large-4'])
                @endif
        @endforeach
    </main>
</section>
@endsection