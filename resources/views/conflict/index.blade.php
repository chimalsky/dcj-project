@extends('layouts.web')

@section('content')
<section class="grid-x grid-margin-y grid-padding-y align-center"
    data-sticky-container>
    
    <main class="cell grid-x grid-margin-x grid-margin-y grid-padding-y">
        @foreach ($conflicts as $c)
            @include('conflict.card', ['conflict' => $c, 'cssClass' => 'cell medium-6 large-4'])
        @endforeach
    </main>

    <footer class="grid-x cell">
        <nav class="callout" style="position:fixed; bottom:0;">
            {{ $conflicts->links() }}
        </nav>
    </footer>
</section>
@endsection