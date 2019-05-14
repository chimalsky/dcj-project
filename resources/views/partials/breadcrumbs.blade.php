@if (count($breadcrumbs))
<nav class="breadcrumb grid-x grid-margin-x grid-padding-y align-middle align-center">
    @foreach ($breadcrumbs as $breadcrumb)

        @if ($breadcrumb->url && !$loop->last)
            <a href="{{ $breadcrumb->url }}" class="cell shrink">
                {{ $breadcrumb->title }}
            </a>

            @if($loop->remaining > 1)
                <span class="cell shrink">
                    >
                </span>
            @endif
       @endif

        @if ($loop->last)
            <h1 class="breadcrumb-item active cell text-center">
                {{ $breadcrumb->title }}
            </h1>
        @endif

    @endforeach
</nav>
@endif