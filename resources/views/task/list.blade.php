
@foreach($tasks as $task)
<a href="{{ route('conflict-series.show', $task->conflictSeries) }}"
    class="cell">
    <section class="grid-x">
        <h2 class="cell">
            {{ $task->conflictSeries->name }}
        </h2>

        <aside class="cell grid-x grid-margin-x">
            <p class="cell medium-shrink">
                Conflict Episodes: {{ $task->conflictEpisodes->count() }}
            </p>

            <p class="cell medium-shrink">
                DCJs: {{ $task->justices->count() }}
            </p>
        </aside>
    </section>
</a>
@endforeach