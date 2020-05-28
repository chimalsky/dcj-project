
<section class="grid-x cell item">
    <header class="cell grid-x">
        <a href="{{ route('conflict-series.show', $conflictSeries->id) }}"
        class="cell">
            <h2 class="cell">
                {{ $conflictSeries->years }} <br/>
                {{ $conflictSeries->sideA }} vs. {{ $conflictSeries->sideB }}
            </h2>
        </a>
    </header>

    <aside class="cell grid-x grid-margin-x">
        <p class="cell large-shrink">
            UCDP #{{ $conflictSeries->id }}
        </p>    

        <p class="cell medium-shrink">
            Conflict Episodes: {{ $conflictSeries->episodes->count() }}
        </p>

        <p class="cell medium-shrink">
            DCJs: {{ $conflictSeries->justices->count() }}
        </p>

        <p class="cell hide">
            Tasked to:
        </p>
    </aside>
</section>