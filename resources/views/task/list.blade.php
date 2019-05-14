
@foreach($tasks as $task)

<article class="grid-x cell align-justify item">
    <header class="cell grid-x">
        <a href="{{ route('conflict-series.show', ['conflict-series' => $task->conflictSeries->id, 'task' => $task->id ]) }}"
        class="cell">
            <h2 class="cell">
                {{ $task->conflictSeries->name }}
            </h2>
        </a>
    </header>

    <main class="cell grid-x align-top">
        <section class="cell medium-auto grid-x grid-margin-x">
            <p class="cell medium-shrink">
                Conflict Years: {{ $task->conflictEpisodes->count() }}
            </p>

            <p class="cell medium-shrink">
                DCJs: {{ $task->conflictSeries->justices->count() }}
            </p>

            <form action="{{ route('task.update', $task) }}" method="post" 
                data-controller="form"
                class="cell medium-shrink">
                @csrf
                @method('put')

                <input type="checkbox" name="status" data-action="change->form#submit"
                    value="1"
                    @if ($task->status)
                        checked
                    @endif
                    @cannot ('update', $task)
                        disabled
                    @endcannot
                    />
                    Task Completed
            </form>
        </section>

        <aside class="cell medium-shrink grid-x">
            <p class="cell">
                @if (Auth::user()->role == 'admin')
                    <span style="font-weight:400">@</span>
                    {{ $task->user->name }}
                @endif

                -- {{ $task->created_at->format('M d') }}

                @unless (Auth::id() == $task->created_by)
                    <span>
                        by {{ $task->assigner->name }}
                    </span>
                @endunless
            </p>
        </aside>
    </main>
</article>
@endforeach