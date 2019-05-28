<article class="card @isset($cssClass) {{ $cssClass }} @endisset">
    @can('edit', $justice)
        <a href="{{ route('justice.edit', ['conflict' => $justice->conflict, 'justice' => $justice, 'task' => isTaskWorkflow() ?? false]) }}">
    @else 
        <a href="{{ route('justice.show', ['conflict' => $justice->conflict, 'justice' => $justice, 'task' => isTaskWorkflow() ?? false]) }}">
    @endcan

    <header class="card-divider grid-x align-justify">

        {{ $justice->dcjid }}

    </header>

        <main class="card-section">
            {{ $justice->name }}

            @if ($justice->updated_at != $justice->created_at)
                <p class="cell">
                    Updated: {{ $justice->updatedAtHuman }}
                </p>
            @endif

            <p class="cell">
                Created: {{ $justice->createdAtHuman }}
            </p>
        </main>
    </a>
</article>
