@extends('layouts.web')

@section('content')

<header class="grid-x align-right">

@unless ($query)
    <a href="{{ route('conflict-series.index') }}" >
        View as Conflict Series
    </a>
@else 
    <a href="{{ route('conflict.index') }}">
        Clear Search
    </a>
@endunless
</header>


<section class="grid-x grid-margin-y grid-padding-y align-center"
    data-sticky-container>

    @unless ($query)
        <form action="{{ route('conflict.index') }}"
            class="cell shrink grid-x grid-margin-x align-middle">
            
            <input type="text" name="query" placeholder="UCDP Conflict Episodes" 
                value="{{ $query }}"
                class="cell auto" />
            <button class="button hollow cell shrink">
                Search 
            </button>
        </form>
    @endunless

    <main class="cell grid-x grid-margin-x grid-margin-y grid-padding-y">
        @foreach ($conflicts as $c)
            @include('conflict.card', ['conflict' => $c, 'cssClass' => 'cell medium-6 large-4'])
        @endforeach
    </main>

    <footer class="grid-x cell">
        <nav class="callout" style="position:fixed; bottom:0;">
            @if ($conflicts instanceof \Illuminate\Pagination\AbstractPaginator)
                {{ $conflicts->links() }}
            @endif
        </nav>
    </footer>
</section>
@endsection