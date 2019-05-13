
@if (count($conflictSeries))
    @foreach ($conflictSeries as $series)
        <li role="option" data-autocomplete-value="{{ $series->id }}"> 
            {{ $series->name }} 
        </li>
    @endforeach
@else
    <div>
        No Conflict matches this search.
    </div>
@endif