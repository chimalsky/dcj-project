
@foreach($tasks as $task)

<section class="grid-x cell item">
    <header class="cell grid-x">
        <a href="{{ route('conflict-series.show', ['conflict-series' => $task->conflictSeries->id, 'task' => $task->id ]) }}"
        class="cell item">
            <h2 class="cell">
                {{ $task->conflictSeries->name }}
            </h2>
        </a>
    </header>

    <aside class="cell grid-x grid-margin-x">
        <p class="cell medium-shrink">
            Conflict Episodes: {{ $task->conflictEpisodes->count() }}
        </p>

        <p class="cell medium-shrink">
            DCJs: {{ $task->conflictSeries->justices->count() }}
        </p>

        @if (Auth::user()->role == 'admin')
            <h1 class="cell">
                <span style="font-weight:400">Assigned to </span>
                @if (Auth::id() == $task->user_id)
                    you
                @else
                    {{ $task->user->name }}
                @endif
            </h1>
        @endif
    </aside>

    <footer class="cell grid-x">
        <p>
            By 
            <span>
            @if (Auth::id() == $task->created_by)
                You
            @else   
                {{ $task->assigner->name }}
            @endif
            </span>
            
            -- {{ $task->created_at->format('F j Y') }}
        </p>
    </footer>
</section>
@endforeach