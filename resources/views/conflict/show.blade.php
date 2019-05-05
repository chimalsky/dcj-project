@extends ('layouts.web')

@section('content')
<main class="grid-x grid-margin-x">
<section class="cell medium-9 large-7">
    <p class="cell">
        Conflict ID: {{ $conflict->id }}
    </p>

    <p class="cell">
        Year: {{ $conflict->year }}
    </p>

    <section class="cell grid-x grid-margin-x">
        <p class="cell medium-auto">
            Start Date: {{ $conflict->start_date }}
        </p>

        <p class="cell medium-auto">
            End Date: {{ $conflict->end_date ?? 'Not Ended' }}
        </p>
    </section>

    <p class="cell">
        Location: {{ $conflict->location }}
    </p>

    <section class="cell grid-x grid-margin-x">
        <p class="cell medium-auto">
            Government Side: {{ $conflict->side_a }}
        </p>

        <p class="cell medium-auto">
            Opposition Side: {{ $conflict->side_b }}
        </p>
    </section>

    <p class="cell">
        Territory: {{ $conflict->territory }}
    </p>
</section>
</main>

<aside class="grid-x grid-margin-x">
    <nav class="cell grid-x grid-margin-x">
        <a class="cell shrink">
            Trial
        </a>
        <a class="cell shrink">
            Truth
        </a>
        <a class="cell shrink">
            Reparations
        </a>
        <a class="cell shrink">
            Amnesty
        </a>
        <a class="cell shrink">
            Purge
        </a>
        <a class="cell shrink">
            Exile
        </a>
    </nav>
</aside>
@endsection