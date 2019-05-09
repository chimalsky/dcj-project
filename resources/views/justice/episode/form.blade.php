<section class="grid-x grid-margin-x cell large-auto">
    <section class="grid-x grid-margin-x cell">
        <div class="cell medium-shrink">
            {{ $justice->startPrecision }}
            
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
            {{ Form::label('start event') }}
            {{ Form::select('start_event', 
                    $justice->startEventCodes,
                    $justice->start_event,
                    ['placeholder' => '---']
                ) 
            }}
        </div>
    </section>

    <section class="grid-x grid-margin-x cell">
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

        <div class="cell medium-shrink">
            {{ Form::label('end event') }}
            {{ Form::select('end_event', 
                    $justice->endEventCodes,
                    $justice->end_event,
                    ['placeholder' => '---']
                ) 
            }}
        </div>
    </section>
</section>

