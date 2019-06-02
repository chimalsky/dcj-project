
@if (count($conflictSeries))
    @foreach ($conflictSeries as $series)
        <li data-controller="click->form#foobar"
            role="option" data-autocomplete-value="{{ $series->id }}" class="cell"> 
            {{ $series->name }} 

            @if ($series->isPolydyadic)
                <p>
                    <strong>
                    Dyads:
                    </strong>
                </p>
            @endif

            @foreach ($series->dyads as $dyadicConflict)
                <p>
                    {{ $dyadicConflict->dyad->name }}
                </p>
            @endforeach
                
        </li>
    @endforeach
@else
    <div>
        No Conflict matches this search.
    </div>
@endif