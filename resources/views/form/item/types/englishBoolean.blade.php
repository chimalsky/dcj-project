<section class="cell medium-6 grid-x english-boolean">
    <header class="cell">
        {{ $label }}
    </header>

    <div data-controller="radio-group"
        class="cell grid-x grid-margin-x">
        <div class="cell shrink"> 
            {{ Form::radio($name, $values[1] ?? 'Yes', $model ? $model->$name : null, [
                'id' => "$name-0",
                'data-target' => 'radio-group.radio',
                'data-action' => 'click->radio-group#select'
            ]) }}
            {{ Form::label("$name-0", $options[1] ?? $values[1] ?? 'Yes') }}
        </div>

        <div class="cell shrink">
            {{ Form::radio($name, $values[0] ?? 'No', $model ? $model->$name : null, [
                'id' => "$name-1", 
                'data-target' => 'radio-group.radio',
                'data-action' => 'click->radio-group#select'
            ]) }}
            {{ Form::label("$name-1", $options[0] ?? $values[0] ?? 'No') }}
        </div>

        <div class="cell shrink">
            {{ Form::radio($name, "N/A", $model ? $model->$name : null, [
                'id' => "$name-na",
                'data-target' => 'radio-group.radio',
                'data-action' => 'click->radio-group#select'
            ]) }}
            {{ Form::label("$name-na", 'N/A') }}   
        </div>
    </div>
</section>