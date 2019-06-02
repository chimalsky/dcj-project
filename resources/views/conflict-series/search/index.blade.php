
@if (count($conflictSeries))
    @foreach ($conflictSeries as $series)
        <li data-controller="click->form#foobar"
            role="option" data-autocomplete-value="{{ $series->id }}" class="cell"> 
            {{ $series->name }} 

            <p>
                {{ $series->sideA }} vs.
            </p>
        
            @foreach ($series->dyads as $dyad)
                {{ $dyad->side_b }} 
                @unless ($loop->last) | @endunless
            @endforeach
        </li>
    @endforeach
@else
    <div>
        No Conflict matches this search.
    </div>
@endif