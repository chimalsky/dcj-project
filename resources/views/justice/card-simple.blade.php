<article class="card @isset($cssClass) {{ $cssClass }} @endisset">
    @can('update', $justice)
        <a href="{{ route('justice.edit', ['conflict' => $justice->conflict, 'justice' => $justice, 'task' => isTaskWorkflow() ?? false]) }}">
    @else 
        <a href="{{ route('justice.show', ['conflict' => $justice->conflict, 'justice' => $justice, 'task' => isTaskWorkflow() ?? false]) }}">
    @endcan
            <header class="card-divider grid-x align-justify">

                {{ $justice->dcjid }}

            </header>

            <main class="card-section">
                {{ $justice->name }}
            </main>
        </a>
        
    <footer class="grid-x grid-margin-x grid-padding-x">
        @foreach($conflict->dyads as $dyadicConflict)
            <div class="cell"> 
                <input type="checkbox" name="dyadicConflicts[{{ $dyadicConflict->id }}]" value="{{ $dyadicConflict->id }}" 
                    @if ($justice->dyadicConflicts->pluck('id')->contains($dyadicConflict->id))
                        checked
                    @endif
                    />
                <label>
                    {{ $dyadicConflict->dyad_id }} {{ $dyadicConflict->side_a }} vs {{ $dyadicConflict->side_b }}
                </label>
            </div>
        @endforeach

        @if ($justice->updated_at != $justice->created_at)
            <p class="cell text-right">
                Updated: {{ $justice->updatedAtHuman }}
            </p>
        @endif

        <p class="cell text-right">
            Created: {{ $justice->createdAtHuman }}
        </p>
    </footer>
</article>
