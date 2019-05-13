@if (count($breadcrumbs))
<nav class="breadcrumb grid-x grid-margin-x grid-padding-y align-middle align-center">
    @foreach ($breadcrumbs as $breadcrumb)

        @if ($breadcrumb->url && !$loop->last)
            <a href="{{ $breadcrumb->url }}" class="cell shrink">
                {{ $breadcrumb->title }}
            </a>
        @else
            @unless($loop->first || $loop->last)
                <span class="cell shrink">
                    >
                </span>
            @endunless
        @endif

        @if ($loop->last)
            <h1 class="breadcrumb-item active cell text-center">
                {{ $breadcrumb->title }}
            </h1>
        @endif

    @endforeach
</nav>
@endif