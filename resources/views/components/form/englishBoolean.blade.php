<section class="cell grid-x english-boolean">
    <header class="cell">
        {{ $label }}
    </header>

    <div data-controller="radio-group"
        class="cell grid-x grid-margin-x">

        <div class="cell shrink"> 
            {{ Form::radio($name, $values[1] ?? 'Yes', $model->$name, [
                'id' => "$name-0",
                'data-target' => 'radio-group.radio',
                'data-action' => 'click->radio-group#select'
            ]) }}
            {{ Form::label("$name-0", $labels[1] ?? $values[1] ?? 'Yes') }}
        </div>

        <div class="cell shrink">
            {{ Form::radio($name, $values[0] ?? 'No', $model->$name, [
                'id' => "$name-1",
                'data-target' => 'radio-group.radio',
                'data-action' => 'click->radio-group#select'
            ]) }}
            {{ Form::label("$name-1", $labels[0] ?? $values[0] ?? 'No') }}
        </div>

        <div class="cell shrink">
            {{ Form::radio($name, "N/A", $model->$name, [
                'id' => "$name-na",
                'data-target' => 'radio-group.radio',
                'data-action' => 'click->radio-group#select'
            ]) }}
            {{ Form::label("$name-na", 'N/A') }}   
        </div>
    </div>
</section>


