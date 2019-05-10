@if (count($breadcrumbs))
<nav class="breadcrumb grid-x grid-margin-x grid-padding-y align-middle">
    @foreach ($breadcrumbs as $breadcrumb)

        @if ($breadcrumb->url && !$loop->last)
            <a href="{{ $breadcrumb->url }}" class="cell shrink">
                {{ $breadcrumb->title }}
            </a>
        @else
            @unless($loop->first)
                <span class="cell shrink">
                    >
                </span>
            @endunless

            <span class="breadcrumb-item active cell shrink">
                <strong>
                    {{ $breadcrumb->title }}
                </strong>
            </span>
        @endif

    @endforeach
</nav>
@endif