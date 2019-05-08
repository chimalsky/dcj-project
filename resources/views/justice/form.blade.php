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
    {{ Form::select('scope', $justice->scopeCodes) }}

    {{ Form::label('scope count') }}
    {{ Form::number('scope_count') }} 
</section>

<section class="grid-x cell callout">
    {{ Form::label('sender') }}
    {{ Form::select('sender', $justice->senderCodes) }}
</section>

<section class="grid-x cell">
    @include('components.form.englishBoolean', [
        'name' => 'peace_initiated',
        'label' => 'Peace Initiated?',
        'model' => $justice
    ])
</section>
