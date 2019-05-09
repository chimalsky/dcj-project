@extends('layouts.web')

@section('content')
<section class="grid-x grid-margin-y grid-padding-y align-center"
    data-sticky-container>
    
    <main class="cell grid-margin-y grid-padding-y">
        @foreach ($conflicts as $conflict)
            <article class="cell large-9">
                @include('conflict.item', ['conflict' => $conflict])
            </article>
        @endforeach
    </main>

    <footer class="grid-x cell">
        <nav class="callout" style="position:fixed; bottom:0;">
            {{ $conflicts->links() }}
        </nav>
    </footer>
</section>
@endsection