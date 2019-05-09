@extends ('layouts.web')

@section('content')

<main class="grid-x grid-margin-x">
<section class="cell medium-9 large-7">
    @include('conflict.title')

    <section class="cell grid-x grid-margin-x">
        <p class="cell medium-auto">
            Start Date: {{ $conflict->start_date }}
        </p>

        <p class="cell medium-auto">
            End Date: {{ $conflict->end_date ?? 'Not Ended' }}
        </p>
    </section>

    <section class="cell grid-x grid-margin-x">
        <p class="cell medium-auto">
            Government Side: {{ $conflict->side_a }}
        </p>

        <p class="cell medium-auto">
            Opposition Side: {{ $conflict->side_b }}
        </p>
    </section>
</section>
</main>

<aside class="grid-x grid-margin-x grid-margin-y">
    <a href="{{ route('justice.create', ['conflict' => $conflict->id]) }}"
        class="cell shrink button secondary">
        Create a new DCJ
    </a>
    
    @include('justice.nav', ['active' => $justiceType])

    @if ($justices->count())
        @foreach ($justices as $j)
            @include('justice.card', ['justice' => $j, 'cssClass' => 'cell medium-6 large-4'])
        @endforeach
    @else 
        <p class="cell text-center">
            No {{ ucfirst($justiceType) }} DCJ Yet
        </p>
    @endif   
</aside>
@endsection