<section class="cell grid-x">
    <header class="cell">
        {{ $label }}
    </header>

    <div class="cell grid-x">
        <div class="cell auto">
            @isset ($values[0])
                {{ Form::radio($name, $values[0], $model->$name) }}
                {{ Form::label($values[0]) }}
            @else
                {{ Form::radio($name, 'Yes', $model->$name) }}
                {{ Form::label('Yes') }}
            @endisset
        </div>

        <div class="cell auto">
            @isset ($values[1])
                {{ Form::radio($name, $values[1], $model->$name) }}
                {{ Form::label($values[1]) }}
            @else
                {{ Form::radio($name, "No", $model->$name) }}
                {{ Form::label('No') }}
            @endisset
        </div>

        <div class="cell auto">
            {{ Form::radio($name, "Null", $model->$name) }}
            {{ Form::label('null') }}   
        </div>
    </div>
</section>