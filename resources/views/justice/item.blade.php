<article class="cell">
    <a href="{{ route('justice.edit', $justice->id) }}"
        class="cell grid-x">

        @unless ( isset($justiceType) )
            <p class="cell">
                {{ $justice->type }}
            </p>
        @endunless
        
        <section class="grid-x grid-margin-x">
            <p class="cell">
                {{ $justice->start_event }} --> {{ $justice->end_event }}
            </p>

            <p class="cell shrink">
                Target: {{ $justice->target }}
            </p>

            <p class="cell shrink">
                Sender: {{ $justice->sender }}
            </p>
        </section>

        <aside class="cell grid-x text-right">
            @if ($justice->updated_at != $justice->created_at)
                <p class="cell">
                    Last Updated: {{ $justice->updated_at }}
                </p>
            @endif
            <p class="cell">
                Created: {{ $justice->created_at }}
            </p>
        </aside>
    </a>
    @isset ($justice->dcjid)
        <p class="cell text-right">
            <i>
                Dcjid code in Excel: <span>
                    {{ $justice->dcjid }}
                </span>
            </i>
        </p>
    @endisset
    
</article>