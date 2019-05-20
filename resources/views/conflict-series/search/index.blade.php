
@if (count($conflictSeries))
    @foreach ($conflictSeries as $series)
        <li data-controller="click->form#foobar"
            role="option" data-autocomplete-value="{{ $series->id }}" class="cell"> 
            UCDP #{{ $series->id }} -- {{ $series->name }} 
        </li>
    @endforeach
@else
    <div>
        No Conflict matches this search.
    </div>
@endif