<a class="cell grid-x callout" href="{{ route('conflict.show', $conflict) }}">
    <div class="cell grid-x align-justify">
        <main>
            {{ $conflict->old_conflict_id }}

            {{ $conflict->year }}
            
            {{ $conflict->location }}
        </main>
        
        <p class="align-right">
            {{ $conflict->territory }}
        </p>
    </div>
                
    <div class="cell">
        {{ $conflict->side_a }}
            vs.
        {{ $conflict->side_b }}    
    </div>   
</a>

<div class="cell text-right">
    <div>
        Total During Justice Conflicts: {{ $conflict->justices_count }}
    </div>

    @if ($loop->odd)
        <a href="{{ route('justice.create', [
                'conflict'=> $conflict->id
            ] ) }}"
            class="button hollow">
            Create a new DCJ
        </a>
    @else
        <div>
            Amnesty <a href="{{ route('justice.create', [
            'conflict' => $conflict->id,
            'justice_type' => 'amnesty'
            ]) }}" class="button hollow">+</a>

            Exile <a href="{{ route('justice.create', [
                'conflict' => $conflict->id,
                'justice_type' => 'exile'
                ]) }}" class="button hollow">+</a>

            Purge <a href="{{ route('justice.create', [
                'conflict' => $conflict->id,
                'justice_type' => 'purge'
                ]) }}" class="button hollow">+</a>

            Reparation <a href="{{ route('justice.create', [
                'conflict' => $conflict->id,
                'justice_type' => 'reparation'
                ]) }}" class="button hollow">+</a>

            Trial <a href="{{ route('justice.create', [
                'conflict' => $conflict->id,
                'justice_type' => 'trial'
                ]) }}" class="button hollow">+</a>

            Truth <a href="{{ route('justice.create', [
                'conflict' => $conflict->id,
                'justice_type' => 'truth'
                ]) }}" class="button hollow">+</a>
        </div>
    @endif
</div> 