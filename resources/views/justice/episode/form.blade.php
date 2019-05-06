<section class="grid-x grid-margin-x cell large-auto">
    <div class="cell medium-shrink">
        {{ Form::label('start precision') }}
        {{ Form::select('start_precision', 
            $justice->precisionCodes,
            $justice->startPrecision,
            ['placeholder' => '---']) 
        }}
    </div>

    <div class="cell medium-shrink">
        {{ Form::label('start date') }}
        {{ Form::date('start') }}
    </div>

    <div class="cell medium-shrink">
        {{ Form::label('end precision') }}
        {{ Form::select('end_precision', 
            $justice->precisionCodes,
            $justice->endPrecision,
            ['placeholder' => '---']) 
        }}
    </div>

    <div class="cell medium-shrink">
        {{ Form::label('end date') }}
        {{ Form::date('end') }}
    </div>
    
</section>

