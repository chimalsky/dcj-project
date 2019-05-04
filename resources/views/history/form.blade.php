<section class="grid-x grid-margin-x cell large-auto">
    <div class="cell medium-shrink">
        {{ Form::label('start precision') }}
        {{ Form::select('start_precision', 
            $trial->historicPrecisionCodes,
            $trial->startPrecision,
            ['placeholder' => '---']) 
        }}
    </div>

    <div class="cell medium-shrink">
        {{ Form::label('start date') }}
        {{ Form::date('start') }}
    </div>
    
    <div class="cell">
        {{ Form::label('start date code') }}
        {{ Form::select('start_code', $trial->startCodes) }}
    </div>

</section>

<section class="grid-x grid-margin-x cell large-auto">
    <div class="cell medium-shrink">
        {{ Form::label('end precision') }}
        {{ Form::select('end_precision', 
            $trial->historicPrecisionCodes,
            $trial->endPrecision,
            ['placeholder' => '---']) 
        }}
    </div>

    <div class="cell medium-shrink">
        {{ Form::label('end date') }}
        {{ Form::date('end') }}
    </div>
    
    <div class="cell">
        {{ Form::label('end date code') }}
        {{ Form::select('end_code', $trial->endCodes) }}
    </div>

</section>
