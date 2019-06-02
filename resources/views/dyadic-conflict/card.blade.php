<article class="card @isset($cssClass) {{ $cssClass }} @endisset">
  <a href="{{ route('conflict.show', [
    'conflict' => $conflict->conflictyear_id,
    'dyad' => $conflict->dyad_id
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
        @isset ( $conflict->territory )
            <p class="cell">
                Over {{ $conflict->territory }}
            </p>
        @endisset
    </main>

    
  </a>

  <aside class="card-section grid-x grid-margin-x">
        <p class="cell">
            Total DCJ Processes: {{ $conflict->justices_count }}
        </p>

        @can ('attachJustice', $conflict->conflict)
            <a href="{{ route('justice.create', [
                    'conflict'=> $conflict->id,
                    'task' => isTaskWorkflow() ?? false
                ] ) }}" class="button cell small hollow">
                Add a new DCJ
            </a>
        @endcan
</aside>
</article>
