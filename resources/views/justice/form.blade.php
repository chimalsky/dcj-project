<section class="grid-x cell align-top">
    @include('justice.episode.form')

    <section class="grid-x cell large-6">
        @include('components.form.englishBoolean', [
            'name' => 'implemented',
            'label' => $justice->type . ' was Implemented?',
            'model' => $justice
        ])
    </section>
</section>

<section class="grid-x grid-margin-x cell callout">
    {{ Form::label('target') }}
    {{ Form::select('target', $justice->targetCodes) }}

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

    {{ Form::label('scope') }}
    {{ Form::select('scope', $justice->scopeCodes, $justice->scope, ['placeholder' => '---']) }}

    {{ Form::label('scope count') }}
    {{ Form::number('scope_count') }} 
</section>

{{ $justice }}

{{ $justice->justiceable }}

<section class="grid-x grid-margin-x cell callout">
    {{ Form::label('sender') }}
    {{ Form::select('sender', $justice->senderCodes) }}
</section>

<section class="grid-x grid-margin-x cell">
    @include('components.form.englishBoolean', [
        'name' => 'peace_initiated',
        'label' => 'Initiated by Peace Agreement?',
        'model' => $justice
    ])
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
            'values' => ['Non-domestic', 'Domestic']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[international]',
            'label' => 'International Involvement?',
            'model' => $justice,
            'values' => ['Non-international', 'International']
        ])

        {{ Form::select('justiceable[venue]', [
                'Domestic law court',
                'Military court',
                'International court',
                'Ad hoc conflict-specific court'
            ],
            null,
            ['placeholder' => 'Select a Trial venue']
            )
        }}

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[absentia]',
            'label' => 'Absentia?',
            'model' => $justice,
            'values' => ['Non-absentia', 'Is absentia']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[executed]',
            'label' => 'Absentia?',
            'model' => $justice,
            'values' => ['No execution', 'Execution']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[breach]',
            'label' => 'Breached?',
            'model' => $justice,
            'values' => ['Non-breach', 'Breach']
        ])
    @endif

    @if ($justice->type == 'truth')
        @include('components.form.englishBoolean', [
            'name' => 'justiceable[report]',
            'label' => 'Report Released?',
            'model' => $justice,
            'values' => ['No release', 'Release']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[breach]',
            'label' => 'Breach of Justice?',
            'model' => $justice,
            'values' => ['Non-breach', 'Breach']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[international]',
            'label' => 'International Involvement?',
            'model' => $justice,
            'values' => ['Non-international', 'International']
        ])
    @endif

    @if ($justice->type == 'reparation')
        @include('components.form.englishBoolean', [
            'name' => 'justiceable[property]',
            'label' => 'Property?',
            'model' => $justice,
            'values' => ['Non-property', 'Property']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[money]',
            'label' => 'Money?',
            'model' => $justice,
            'values' => ['Non-monetary', 'Monetary']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[training_education]',
            'label' => 'Training/Education',
            'model' => $justice,
            'values' => ['No skills/education', 'Skills/education']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[community]',
            'label' => 'Community',
            'model' => $justice,
            'values' => ['Non-community', 'Community']
        ])
    @endif

    @if ($justice->type == 'amnesty')
        @include('components.form.englishBoolean', [
            'name' => 'justiceable[limited]',
            'label' => 'Limited?',
            'model' => $justice,
            'values' => ['Not limited', 'Limited']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[unconditional]',
            'label' => 'Amnesty conditions were:',
            'model' => $justice,
            'values' => ['Not unconditional', 'Unconditional']
        ])
    @endif

    @if ($justice->type == 'purge')
        @include('components.form.englishBoolean', [
            'name' => 'justiceable[permanent]',
            'label' => 'Permanent?',
            'model' => $justice,
            'values' => ['Non-permanent', 'Permanent']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[military]',
            'label' => 'Military?',
            'model' => $justice,
            'values' => ['Non-military', 'Military']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[judiciary]',
            'label' => 'Judiciary?',
            'model' => $justice,
            'values' => ['Non-judiciary', 'Judiciary']
        ])

        @include('components.form.englishBoolean', [
            'name' => 'justiceable[civil_service]',
            'label' => 'Civil Service?',
            'model' => $justice,
            'values' => ['Not civil service', 'Civil service']
        ])
    @endif
    
    @if ($justice->type == 'exile')
        @include('components.form.englishBoolean', [
            'name' => 'justiceable[permanent]',
            'label' => 'Permanent?',
            'model' => $justice,
            'values' => ['Non-permanent', 'permanent']
        ])
    @endif

    <footer class="cell">
        <input id="coding_notes" type="hidden" name="coding_notes"
            @if (isset($justice->coding_notes))
                value="{{ $justice->coding_notes }}"
            @endif
            />
        <trix-editor input="coding_notes"></trix-editor>
    </footer>
</section>
