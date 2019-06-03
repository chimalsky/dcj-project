<section class="cell grid-x english-boolean">
    <header class="cell">
        {{ $label }}
    </header>

    <div class="cell grid-x">
        <div class="cell auto"> 
            {{ Form::radio($name, $values[1] ?? 'Yes', $model->$name, ['id' => "$name-0", "data-action" => "click->form#radio"]) }}
            {{ Form::label("$name-0", $labels[1] ?? $values[1] ?? 'Yes') }}
        </div>

        <div class="cell auto">
            {{ Form::radio($name, $values[0] ?? 'No', $model->$name, ['id' => "$name-1", "data-action" => "click->form#radio"]) }}
            {{ Form::label("$name-1", $labels[0] ?? $values[0] ?? 'No') }}
        </div>

        <div class="cell auto">
            {{ Form::radio($name, "N/A", $model->$name, ['id' => "$name-null", "data-action" => "click->form#radio"]) }}
            {{ Form::label("$name-null", 'N/A') }}   
        </div>
    </div>
</section>