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

    @if ($justice->type == 'trial')
        @include('components.form.englishBoolean', [
            'name' => 'justiceable[domestic]',
            'label' => 'Location domestic?',
            'model' => $justice,
            'labels' => ['Non-domestic', 'Domestic']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[international]',
            'label' => 'International Involvement?',
            'model' => $justice,
            'labels' => ['Non-international', 'International']
        ])

        {{ Form::select('justiceable[venue]', [
                'Domestic law court' => 'Domestic law court',
                'Military court' => 'Military court',
                'International court' => 'International court',
                'Ad hoc conflict-specific court' => 'Ad hoc conflict-specific court'
            ],
            null,
            ['placeholder' => 'Select a Trial venue']
            )
        }}

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[absentia]',
            'label' => 'Absentia?',
            'model' => $justice,
            'labels' => ['Non-absentia', 'Is absentia']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[executed]',
            'label' => 'Executed?',
            'model' => $justice,
            'labels' => ['No execution', 'Execution']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[breach]',
            'label' => 'Breached?',
            'model' => $justice,
            'labels' => ['Non-breach', 'Breach']
        ])
    @endif

    @if ($justice->type == 'truth')
        @include('components.form.englishBoolean', [
            'name' => 'justiceable[report]',
            'label' => 'Report Released?',
            'model' => $justice,
            'labels' => ['No release', 'Release']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[breach]',
            'label' => 'Breach of Justice?',
            'model' => $justice,
            'labels' => ['Non-breach', 'Breach']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[international]',
            'label' => 'International Involvement?',
            'model' => $justice,
            'labels' => ['Non-international', 'International']
        ])
    @endif

    @if ($justice->type == 'reparation')
        @include('components.form.englishBoolean', [
            'name' => 'justiceable[property]',
            'label' => 'Property?',
            'model' => $justice,
            'labels' => ['Non-property', 'Property']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[money]',
            'label' => 'Money?',
            'model' => $justice,
            'labels' => ['Non-monetary', 'Monetary']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[training_education]',
            'label' => 'Training/Education',
            'model' => $justice,
            'labels' => ['No skills/education', 'Skills/education']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[community]',
            'label' => 'Community',
            'model' => $justice,
            'labels' => ['Non-community', 'Community']
        ])

        <div class="cell">
            {{ Form::select('justiceable[funder]', [
                    'Side A' => 'Side A',
                    'Side B' => 'Side B',
                    'Both' => 'Both',
                    'Other' => 'Other',
                    'International' => 'International'
                ],
                null,
                ['placeholder' => 'Funder of the Reparation']
                )
            }}
        </div>
    @endif

    @if ($justice->type == 'amnesty')
        @include('components.form.englishBoolean', [
            'name' => 'justiceable[limited]',
            'label' => 'Limited?',
            'model' => $justice,
            'labels' => ['Not limited', 'Limited']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[unconditional]',
            'label' => 'Amnesty conditions were:',
            'model' => $justice,
            'labels' => ['Not unconditional', 'Unconditional']
        ])
    @endif

    @if ($justice->type == 'purge')
        @include('components.form.englishBoolean', [
            'name' => 'justiceable[permanent]',
            'label' => 'Permanent?',
            'model' => $justice,
            'labels' => ['Non-permanent', 'Permanent']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[military]',
            'label' => 'Military?',
            'model' => $justice,
            'labels' => ['Non-military', 'Military']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[judiciary]',
            'label' => 'Judiciary?',
            'model' => $justice,
            'labels' => ['Non-judiciary', 'Judiciary']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[civil_service]',
            'label' => 'Civil Service?',
            'model' => $justice,
            'labels' => ['Not civil service', 'Civil service']
        ])
    @endif
    
    @if ($justice->type == 'exile')
        @include('components.form.englishBoolean', [
            'name' => 'justiceable[permanent]',
            'label' => 'Permanent?',
            'model' => $justice,
            'labels' => ['Non-permanent', 'permanent']
        ])
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
