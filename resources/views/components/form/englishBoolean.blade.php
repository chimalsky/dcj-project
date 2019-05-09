<section class="cell grid-x">
    <header class="cell">
        {{ $label }}
    </header>

    <div class="cell grid-x">
        <div class="cell auto">
            {{ Form::radio($name, $values[0] ?? 'Yes', $model->$name, ['id' => "$name-0"]) }}
            {{ Form::label("$name-0", 'Yes') }}
        </div>

        <div class="cell auto">
            {{ Form::radio($name, $values[1] ?? 'No', $model->$name, ['id' => "$name-1"]) }}
            {{ Form::label("$name-1", 'No') }}
        </div>

        <div class="cell auto">
            {{ Form::radio($name, "", $model->$name, ['id' => "$name-null"]) }}
            {{ Form::label("$name-null", 'N/A') }}   
        </div>
    </div>
</section>