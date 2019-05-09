<nav class="cell grid-x grid-margin-x grid-padding-y breadcrumbs">
    <a href="{{ route('conflict.index') }}" class="cell shrink">
        Conflict Episodes
    </a>

    @isset ($conflict)
        <span class="cell shrink"> 
            >
        </span>

        <a href="{{ route('conflict.show', $conflict) }}"
            class="cell shrink">
            {{ $conflict->year }} -- {{ $conflict->location }}
        </a>
    @endisset

    @isset ($justice)
        <span class="cell shrink"> 
            >
        </span>

        @isset ($justice->id)
            <a href="{{ route('justice.edit', $justice) }}"
                class="cell shrink">
                {{ ucfirst($justice->type) }} # {{ $justice->count }}
            </a>
        @else
            <p
                class="cell shrink">
                Create DCJ
            </p>
        @endisset
    @endisset
</nav>