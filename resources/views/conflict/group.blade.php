<section class="callout cell grid-x grid-margin-x">
<h1 class="cell"> 
    {{ $conflict->year }}
</h1>

@foreach ($conflict->dyads as $dyad)
    @include('dyadic-conflict.card', ['conflict' => $dyad, 'cssClass' => 'cell medium-6 large-4'])
@endforeach
</section>