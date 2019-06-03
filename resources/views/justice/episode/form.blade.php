<section class="grid-x grid-margin-x">
    <section class="grid-x grid-margin-x cell large-auto callout">
        <div data-controller="date-picker"
            class="cell grid-x">
            
            <section class="grid-x grid-margin-x cell">
                <div class="cell medium-shrink">                    
                    {{ Form::label('start precision') }}
                    {{ Form::select('start_precision', 
                        $justice->precisionCodes,
                        $justice->startPrecision,
                        [
                            'placeholder' => '---',
                            'data-action' => 'change->date-picker#updatePrecision',
                            'data-target' => 'date-picker.precision'
                        ]) 
                    }}
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

            <section class="grid-x cell">
                <input data-target="date-picker.dateInput" type="hidden" name="start" />
    
                <div data-target="date-picker.input date-picker.day"
                    class="cell auto">
                    {{ Form::label('day') }}
                    {{ Form::number(null, $justice->startDay ?? 1, [
                        'min' => 1,
                        'max' => 31,
                        'data-action' => 'change->date-picker#inputChanged'
                    ]) }}
                </div>

                <div data-target="date-picker.input date-picker.month"
                    class="cell auto">
                    {{ Form::label('month') }}
                    {{ Form::selectMonth(null, $justice->startMonth ?? 1, [
                        'data-action' => 'change->date-picker#inputChanged'
                    ]) }} 

                </div>

                <div data-target="date-picker.input date-picker.year"
                    class="cell auto">
                    {{ Form::label('year') }}
                    {{ Form::number(null, $justice->startYear ?? $conflict->year, [
                        'data-action' => 'change->date-picker#inputChanged'
                    ]) }}
                </div>
            </section>
        </div>
    </section>

    <section class="grid-x grid-margin-x cell large-auto callout">
        <div data-controller="date-picker"
            class="cell grid-x">
            
            <section class="grid-x grid-margin-x cell">
                <div class="cell medium-shrink">                    
                    {{ Form::label('end precision') }}
                    {{ Form::select('end_precision', 
                        $justice->precisionCodes,
                        $justice->endPrecision,
                        [
                            'placeholder' => '---',
                            'data-action' => 'change->date-picker#updatePrecision',
                            'data-target' => 'date-picker.precision'
                        ]) 
                    }}
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

            <section class="grid-x cell">
                <input data-target="date-picker.dateInput" type="hidden" name="end" />

                <div data-target="date-picker.input date-picker.day"
                    class="cell auto">
                    {{ Form::label('day') }}
                    {{ Form::number(null, $justice->endDay ?? 1, [
                        'min' => 1,
                        'max' => 31,
                        'data-action' => 'change->date-picker#inputChanged'
                    ]) }}
                </div>

                <div data-target="date-picker.input date-picker.month"
                    class="cell auto">
                    {{ Form::label('month') }}
                    {{ Form::selectMonth(null, $justice->endMonth ?? 1, [
                        'data-action' => 'change->date-picker#inputChanged'
                    ]) }} 
                </div>

                <div data-target="date-picker.input date-picker.year"
                    class="cell auto">
                    {{ Form::label('year') }}
                    {{ Form::number(null, $justice->endYear ?? $conflict->year, [
                        'data-action' => 'change->date-picker#inputChanged'
                    ]) }}
                </div>
            </section>
        </div>
    </section>
</section>

