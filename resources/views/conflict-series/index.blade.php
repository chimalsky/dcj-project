@extends ('layouts.web')

@section('content')
<header class="grid-x align-right">
    <a href="{{ route('conflict.index') }}" >
        View as UCDP Conflict Episodes
    </a>
</header>

<section class="grid-x align-center"
    data-sticky-container>

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

