<article class="card @isset($cssClass) {{ $cssClass }} @endisset">
  <a href="{{ route('justice.edit', ['conflict' => $justice->conflict, 'justice' => $justice]) }}">
    <header class="card-divider grid-x align-justify">
        @unless ( isset($justiceType) )
            <p class="cell auto">
                {{ ucfirst($justice->type) }} # {{ $justice->count }}
            </p>
        @endunless
        
        @if( isset($justice->implemented) )
            <p class="cell shrink">
                @if (translate_englishBoolean($justice->implemented))   
                    Implemented
                @else 
                    Not implemented
                @endif
            </p>
        @endif
    </header>

    <main class="card-section">
        <div class="grid-x grid-margin-x align-top">
            @isset($justice->start)
                <p class="cell auto">
                    {{ $justice->start->format('M j') }} 
                    {{ $justice->start_event }}
                </p>
            @endisset

            @isset($justice->end)
                <p class="cell auto">
                    {{ $justice->end->format('M j') }}
                    {{ $justice->end_event }}
                </p>
            @endisset
        </div>

        <p class="cell shrink">
            <strong>
                {{ $justice->target }}
            </strong>
        </p>

        <p class="cell shrink">
            Sender: {{ $justice->sender }}
        </p>
    </main>
  </a>

    <footer class="card-divider grid-x">
        @if ($justice->updated_at != $justice->created_at)
            <p class="cell">
                Updated: {{ $justice->updatedAtHuman }}
            </p>
        @endif

        <p class="cell">
            Created: {{ $justice->createdAtHuman }}
        </p>

        @isset ($justice->dcjid)
            <p class="cell">
                <i>
                    Dcjid code in Excel: <span>
                        {{ $justice->dcjid }}
                    </span>
                </i>
            </p>
        @endisset
    </footer>
</article>
