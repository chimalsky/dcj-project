
<article class="grid-x grid-padding-x cell item" data-task-status="{{ $task->status }}">
    <header class="cell grid-x align-justify align-top">
        <a href="{{ route('conflict-series.show', ['conflict-series' => $task->conflictSeries->id, 'task' => $task->id ]) }}"
        class="cell auto">
            <h2 class="cell">
                {{ $task->conflictSeries->name }}
            </h2>
            <p class="cell">
                @foreach ( $task->conflictSeries->dyads as $dyadicConflict )
                    {{ $dyadicConflict->side_b }} 
                    @unless ($loop->last) | @endunless
                @endforeach
            </p>
        </a>

        <section class="cell shrink grid-x grid-margin-x">
            @can('delete', $task)
                <form class="cell shrink" data-controller="form"
                    action="{{ route('task.destroy', $task) }}" method="post">
                    @csrf 
                    @method('delete')

                    <button data-action="click->form#delete"
                        class="cell shrink button hollow warning">
                        Delete
                    </button>
                </form>
            @endcan
        </section>
    </header>

    <main class="cell grid-x align-justify">
        <section class="cell medium-shrink grid-x grid-margin-x">
            <p class="cell medium-shrink">
                Conflict Years: {{ $task->conflict_episodes_count }}
            </p>

            <p class="cell medium-shrink">
                DCJs: {{ $task->conflict_justices_count }}
            </p>
        </section>

        <aside class="cell grid-x text-right">
            <p class="cell">
                <span style="font-weight:400">@</span>
                <a href="{{ route('user.task.index', $task->user) }}">
                    {{ $task->user->name }}
                </a>

                -- {{ $task->created_at->format('M d') }}

                @unless (Auth::id() == $task->created_by)
                    <span>
                        by {{ $task->assigner->name }}
                    </span>
                @endunless
            </p>

            @if ($task->status == 3)
                <p class="cell">
                    Task Finalized
                </p>
            @endif

            @if ($task->status == 2)
                <p class="cell">
                    Task is currently under review
                </p>
            @elseif ($task->status < 2)
                <form action="{{ route('task.update', $task) }}" method="post" 
                    data-controller="form"
                    class="cell">
                    @csrf
                    @method('put')

                    <input name="user" value="{{ $task->user_id }}" type="hidden" />
                                                                                    
                    <input type="checkbox" name="status" data-action="change->form#submit"
                        value="1"
                        @if ($task->status == 1)
                            checked
                        @endif

                        @cannot ('markComplete', $task)
                            disabled
                        @endcannot
                        />
                        
                        @if ($task->status < 2)
                            Mark as Completed for Helga
                        @endif
                </form>
            @endif

            <section class="cell grid-x align-right">

                <form class="cell shrink" data-controller="form"
                    action="{{ route('task.update', $task) }}" method="post">
                    @csrf 
                    @method('put')

                    @can('unlock', $task)
                        <input type="hidden" name="status" value="1" />

                        <button class="button hollow">
                            Unlock the task
                        </button>
                    @endcan
                </form>

                <form class="cell shrink" data-controller="form"
                    action="{{ route('task.update', $task) }}" method="post">
                    @csrf 
                    @method('put')

                    <section class="cell shrink">
                        @can('lock', $task)
                            <input type="hidden" name="status" value="2" />

                            <button class="button hollow">
                                Lock and Review
                            </button>
                        @endcan

                        @can('finalize', $task)
                            <input type="hidden" name="status" value="3" />

                            <button class="button">
                                I've finalized my review of this task
                            </button>
                        @endcan

                        @can('unfinalize', $task)
                            <input type="hidden" name="status" value="2" />

                            <button class="button">
                                Unfinalize this task
                            </button>
                        @endcan
                    </section>
                </form>
            </section>
        </aside>
    </main>
</article>