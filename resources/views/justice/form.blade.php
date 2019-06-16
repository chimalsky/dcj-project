<input type="hidden" name="task" value="{{ isTaskWorkflow() }}" />
@isset ($justiceType)
    <input type="hidden" name="type" value="{{ $justiceType }}" />
@endisset
<input type="hidden" name="conflict_id" value="{{ $conflict->id }}"/>

<section data-controller="form"
    data-form-conflict-year="{{ $conflict->year }}"
    class="grid-x grid-margin-y cell align-top">
    
    <section class="grid-x grid-margin-x cell">
        <h1 class="cell">
            UCDP Dyads 
        </h1>
            
        @foreach($conflict->dyads as $dyadicConflict)
            <div class="cell"> 
                <input type="checkbox" name="dyadicConflicts[{{ $dyadicConflict->id }}]" value="{{ $dyadicConflict->id }}" 
                    @if ($justice->dyadicConflicts->pluck('id')->contains($dyadicConflict->id))
                        checked
                    @else
                        @if (request()->query('dyad') == $dyadicConflict->dyad_id)
                            checked
                        @elseif (!request()->query('dyad') && $loop->first)
                            checked
                        @endif
                    @endif
                    />
                <label>
                    {{ $dyadicConflict->dyad_id }} {{ $dyadicConflict->side_a }} vs {{ $dyadicConflict->side_b }}
                </label>
            </div>
        @endforeach
    </section>

    <section class="grid-x grid-margin-y cell">
        <div class="cell large-auto">
            @include('components.form.englishBoolean', [
                'name' => 'implemented',
                'label' => 'DCJ was Implemented?',
                'model' => $justice
            ])
        </div>

        <div class="cell large-auto">
            @include('components.form.englishBoolean', [
                'name' => 'peace_initiated',
                'label' => 'Initiated by Peace Agreement?',
                'model' => $justice
            ])
        </div>
    </section>

    @include('justice.episode.form')

</section>

<section class="grid-x grid-margin-x grid-margin-y cell callout">
    <div class="cell">
        {{ Form::label('target') }}
        {{ Form::select('target', $justice->targetCodes) }}
    </div>
    <div class="cell auto">
        {{ Form::label('scope') }}
        {{ Form::select('scope', $justice->scopeCodes, $justice->scope, ['placeholder' => '---']) }}
    </div> 

    <div class="cell auto">
        {{ Form::label('scope count') }}
        {{ Form::number('scope_count') }} 
    </div>
    

    <div class="cell grid-x grid-margin-y">
        @include('components.form.englishBoolean', [
            'name' => 'civilian',
            'label' => 'Was Civilian?',
            'model' => $justice
        ])
        
        @include('components.form.englishBoolean', [
            'name' => 'rank_and_file',
            'label' => 'Was Rank and File?',
            'model' => $justice
        ])

        @include('components.form.englishBoolean', [
            'name' => 'elite',
            'label' => 'Was Elite?',
            'model' => $justice
        ])  
    </div> 
</section>

<section class="grid-x grid-margin-x cell callout">
    {{ Form::label('sender') }}
    {{ Form::select('sender', $justice->senderCodes) }}
</section>

<section class="grid-x grid-margin-x grid-margin-y cell">
    <div class="cell medium-6 large-4">
        {{ Form::label('wrong doing') }}
        {{ Form::select('wrong', $justice->wrongCodes, $justice->wrong, ['placeholder' => '---']) }}
    </div>

    <div class="cell medium-6 large-4">
        {{ Form::label('targeted gender') }}
        {{ Form::select('gender', $justice->genderCodes, $justice->gender, ['placeholder' => '---']) }}
    </div>

    <div class="cell medium-6 large-4">
        {{ Form::label('sexual violence') }}
        {{ Form::select('sexviolence', $justice->sexviolenceCodes, $justice->sexviolence, ['placeholder' => '---']) }}
    </div>


    @if ($justice->form->items)
        @foreach ($justice->form->items as $meta)
            @if (!isset($meta['type']))
                @include('components.form.englishBoolean', [
                    'name' => 'items[' . $meta['name'] . ']',
                    'label' => $meta['label'],
                    'model' => $justice,
                    'labels' => $meta['options']
                ])
            @elseif ($meta['type'] == 'dropdown')
                @include('components.form.select', $meta)
            @endif
        @endforeach
    @endif

    <div class="cell medium-6">
        {{ Form::label('related justice') }}
        {{ Form::select('related', $justice->possibleRelated ?? $conflict->justicesSelect, $justice->related, ['placeholder' => '---']) }}
    </div>

    <footer class="cell">
        <input id="coding_notes" type="hidden" name="coding_notes"
            @if (isset($justice->coding_notes))
                value="{{ $justice->coding_notes }}"
            @endif
            />
        <trix-editor input="coding_notes"></trix-editor>
    </footer>
</section>
