@extends ('layouts.web')

@section('content')

<main class="grid-x grid-margin-x grid-margin-y">
    
@can ('attachJustice', $conflict)
<section class="cell grid-x align-right">
    <a href="{{ route('justice.create', [
        'conflict' => $conflict->id, 
        'task' => isTaskWorkflow() ?? false,
        'dyad' => request()->query('dyad') ?? false 
        ])
        }}"
        class="cell shrink button hollow align-right">
        Create a new DCJ
    </a>
</section>
@endcan

<section class="cell medium-9 large-7">
    @include('conflict.title')

    <div class="cell grid-x grid-margin-x grid-margin-y callout">
        <header class="cell grid-x grid-margin-x align-top">
            @if ($conflict->dyads()->count() > 1)
                <p class="cell shrink">
                    Dyads: 
                </p>
                <ul class="menu cell auto">
                    @foreach ($conflict->dyads as $dyad)
                        <li>
                            <a href="{{ route('conflict.show', [
                                'conflict' => $conflict->id,
                                'dyad' => $dyad->dyad_id
                                ]) }}"
                                @if ($selectedDyadicConflict->dyad_id == $dyad->dyad_id)
                                    class="is-active"
                                @endif
                                >
                                {{ $dyad->dyad_id }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else 
                Dyad ID: {{ $selectedDyadicConflict->dyad_id }}
            @endif
        </header>

        <section class="cell grid-x grid-margin-x">
            <p class="cell medium-auto">
                Side A: {{ $selectedDyadicConflict->side_a }}
            </p>

            <p class="cell medium-auto">
                Side B: {{ $selectedDyadicConflict->side_b }}
            </p>
        </section>

        <section class="cell grid-x grid-margin-x">
            <p class="cell medium-auto">
                Start Date: {{ $selectedDyadicConflict->start_date }} <br/>
                Start 2 Date: {{ $selectedDyadicConflict->start_2_date }}
            </p>

            <p class="cell medium-auto">
                End Date: {{ $selectedDyadicConflictDate->episode_end_date ?? 'Not Ended' }}
            </p>
        </section>
    </div>
</section>
</main>

<aside class="grid-x grid-margin-x grid-margin-y">
    <section class="cell grid-x grid-margin-y align-center">
        <div class="cell grid-x medium-10 large-8 text-center">
            @include('justice.nav', ['active' => $justiceType])
        </div>
    </section>

    @if ($justices->count())
        @foreach ($justices as $j)
            @include('justice.card-simple', ['justice' => $j, 'cssClass' => 'cell medium-6 large-4'])
        @endforeach
    @else 
        <p class="cell text-center">
            No DCJ Yet
        </p>
    @endif   
</aside>
@endsection