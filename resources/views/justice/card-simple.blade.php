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
        
    <footer data-controller="edit-panel" class="grid-x grid-margin-x grid-padding-x grid-margin-y">
        <form class="cell" action="post">
            @csrf 
            @method('put')

            @foreach($conflict->dyads as $dyadicConflict)
                <div class="cell"> 
                    <input data-action="change->edit-panel#edit" 
                        type="checkbox" name="dyadicConflicts[{{ $dyadicConflict->id }}]" value="{{ $dyadicConflict->id }}" 
                        @cannot("update", $justice)
                            disabled
                        @endcannot
                        @if ($justice->dyadicConflicts->pluck('id')->contains($dyadicConflict->id))
                            checked
                        @endif
                        />
                    <label>
                       ( Dyad: {{ $dyadicConflict->dyad_id }} ) -- {{ $dyadicConflict->side_b }}
                    </label>
                </div>
            @endforeach
        </form>

        @if ($justice->updated_at != $justice->created_at)
            <p class="cell text-right">
                Last Updated: {{ $justice->updated_at }}
            </p>
        @endif

        <p class="cell text-right">
            Created: {{ $justice->created_at }}
            @isset($justice->user)
                - {{ $justice->user->name }}
            @endisset
        </p>
    </footer>
</article>
