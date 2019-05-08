<section class="cell grid-x">
    <header class="cell">
        {{ $label }}
    </header>

    <div class="cell grid-x">
        <div class="cell auto">
            {{ Form::radio($name, 'Yes', $model->$name) }}
            {{ Form::label('Yes') }}

        </div>

        <div class="cell auto">
            {{ Form::radio($name, "No", $model->$name) }}
            {{ Form::label('No') }}
        </div>

        <div class="cell auto">
            {{ Form::radio($name, "Null", $model->$name) }}
            {{ Form::label('null') }}   
        </div>
    </div>
</section>