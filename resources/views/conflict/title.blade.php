<header class="grid-x">
    <section class="cell grid-x grid-margin-x">
        <h2 class="cell small-12 grid-x">
            UCDP
        </h2>

        <p class="cell medium-shrink">
            Conflict ID: 
            
            {{ $conflict->conflict_id }}
        </p>

        <p class="cell medium-shrink">
            Old Conflict ID: {{ $conflict->old_conflict_id }}
        </p>

        <p class="cell medium-shrink">
            Dyad id: {{ $conflict->dyad->id }}
        </p>
    </section>

    <p class="cell">
        Year: {{ $conflict->year }}
    </p>

    <p class="cell">
        Territory: {{ $conflict->territory ?? 'No Territory' }} 
    </p>

    <p class="cell">
        Location: {{ $conflict->location }}
    </p>
</header>