<header class="grid-x cell">
    <section class="cell grid-x grid-margin-x align-top">
        <h2 class="cell medium-shrink">
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