<article class="card @isset($cssClass) {{ $cssClass }} @endisset">
  <a href="{{ route('conflict.show', $conflict) }}">
    <header class="card-divider grid-x align-justify">
        <h1 class="cell">
            <span class="year"> 
                {{ $conflict->year }}
            </span>

            {{ $conflict->location }}
        </h1>
    </header>

    <main class="card-section cell grid-x grid-margin-y">
        <div class="cell">
            {{ $conflict->side_a }}
                vs.
            {{ $conflict->side_b }}    
        </div>   

        @isset ( $conflict->territory )
            <div class="cell">
                Territory: {{ $conflict->territory }}
            </div>
        @endisset
    </main>
  </a>
</article>
