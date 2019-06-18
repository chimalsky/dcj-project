<article class="grid-x">
    <header class="cell grid-x grid-margin-x">
        <div class="cell medium-shrink">
            <h2>
                Name 
            </h2>
            <p>
                {{ $item->name }}
            </p>
        </div>

        <div class="cell medium-auto">
            <h2>
                Label 
            </h2>
            <p>
                {{ $item->label }}
            </p>
        </div>
    </header>

    <main class="cell grid-x grid-margin-x">
        <h2 class="cell">
            Options
        </h2>
        
        <ul class="cell callout grid-margin-x">
        @foreach ($item->options as $option) 
            <li class="cell">
                {{ $option }}
            </li>
        @endforeach
        </ul>
    </main>
   
</article>