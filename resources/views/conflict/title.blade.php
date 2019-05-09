<header class="grid-x">
    <section class="cell grid-x align-justify">
        <p class="cell auto">
            UCDP Conflict ID: 
            
            {{ $conflict->conflict_id }}
        </p>

        <p class="cell shrink">
            <i>
                DCJ Project Old Conflict ID: {{ $conflict->old_conflict_id }}
            </i>
        </p>
    </section>

    <p class="cell">
        Year: {{ $conflict->year }}
    </p>

    <p class="cell">
        Location: {{ $conflict->location }}
    </p>
</header>