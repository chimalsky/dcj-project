
<section class="grid-x cell item">
    <header class="cell grid-x">
        <a href="{{ route('conflict-series.show', ['conflict-series' => $conflictSeries->id ]) }}"
        class="cell item">
            <h2 class="cell">
                {{ $conflictSeries->name }}
            </h2>
        </a>
    </header>

    <aside class="cell grid-x grid-margin-x">
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