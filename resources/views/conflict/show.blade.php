@extends ('layouts.web')

@section('content')

<main class="grid-x grid-margin-x grid-margin-y">
    
@can ('attachJustice', $conflict)
<section class="cell grid-x align-right">
    <a href="{{ route('justice.create', ['conflict' => $conflict->id, 'task' => isTaskWorkflow() ?? false ]) }}"
        class="cell shrink button hollow align-right">
        Create a new DCJ
    </a>
</section>
@endcan

<section class="cell medium-9 large-7">
    @include('conflict.title')

    <section class="cell grid-x grid-margin-x">
        <p class="cell medium-auto">
            Start Date: {{ $conflict->start_date }} <br/>
            Start 2 Date: {{ $conflict->start_2_date }}
        </p>

        <p class="cell medium-auto">
            End Date: {{ $conflict->episode_end_date ?? 'Not Ended' }}
        </p>
    </section>

    <section class="cell grid-x grid-margin-x">
        <p class="cell medium-auto">
            Side A: {{ $conflict->side_a }}
        </p>

        <p class="cell medium-auto">
            Side B: {{ $conflict->side_b }}
        </p>
    </section>
</section>
</main>

<aside class="grid-x grid-margin-x grid-margin-y">
    <section class="cell grid-x grid-margin-y align-center">
        <div class="cell grid-x medium-10 large-8 text-center">
            @include('justice.nav', ['active' => $justiceType])
        </div>
    </section>

    @if ($justices->count())
        @foreach ($justices as $j)
            @include('justice.card-simple', ['justice' => $j, 'cssClass' => 'cell medium-6 large-4'])
        @endforeach
    @else 
        <p class="cell text-center">
            No DCJ Yet
        </p>
    @endif   
</aside>
@endsection