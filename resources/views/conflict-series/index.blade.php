@extends ('layouts.web')

@section('content')
<header class="grid-x">
    <a href="{{ route('conflict.index') }}" class="cell button shrink">
        View as International UCDP Conflict Years
    </a>
</header>

<section class="grid-x align-center grid-margin-y"
    data-sticky-container>

    <form action="{{ route('conflict-series.index') }}"
        class="cell shrink grid-x grid-margin-x align-middle">
        
        <input type="text" name="query" placeholder="UCDP Conflicts" 
            value="{{ $query }}"
            class="cell auto" />
        <button class="button hollow cell shrink">
            Search 
        </button>
    </form>

    <main class="cell grid-x grid-margin-x">
        @foreach ( $conflictSeries as $series )
            @include('conflict-series.item', ['conflictSeries' => $series])
        @endforeach
    </main>


    <footer class="grid-x cell">
        <nav class="callout" style="position:fixed; bottom:0;">
            {{ $conflictSeries->links() }}
        </nav>
    </footer>
</section>
@endsection

