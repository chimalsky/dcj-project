<article class="card @isset($cssClass) {{ $cssClass }} @endisset">
  <a href="{{ route('conflict.show', [
        'conflict' => $conflict->id,
        'task' => isTaskWorkflow() ?? false
    ]) }}">
    <header class="card-divider grid-x align-justify">
        <h1 class="cell">
            <span class="year"> 
                {{ $conflict->year }}
            </span>

            <div class="cell">
                {{ $conflict->side_a }}
                    vs.
                {{ $conflict->side_b }}    
            </div>  
        </h1>
    </header>

    <main class="card-section cell grid-x grid-margin-y">
        <p class="cell">
            In {{ $conflict->location }}
        </p>

        @isset ( $conflict->territory )
            <p class="cell">
                Over {{ $conflict->territory }}
            </p>
        @endisset
    </main>

    <aside class="card-section grid-x">
        <section class="cell text-right">
            <p class="cell">
                UCDP Conflict ID: {{ $conflict->conflict_id }}
            </p>

            <p class="cell">
                Dyad ID: {{ $conflict->dyad_id }}
            </p>

            <p class="cell">
                Old Conflict ID: {{ $conflict->old_conflict_id }}
            </p>
        </section>
    </aside>
  </a>

    <footer class="card-divider grid-x">
        <p class="cell">
            Total DCJ Processes: {{ $conflict->justices_count }}
        </p>

        @can ('attachJustice', $conflict)
            <a href="{{ route('justice.create', [
                    'conflict'=> $conflict->id,
                    'task' => isTaskWorkflow() ?? false
                ] ) }}" class="button small hollow">
                Add a new DCJ
            </a>
        @endcan
    </footer>
</article>
