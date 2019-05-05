<section class="grid-x grid-margin-x cell large-auto">
    <div class="cell medium-shrink">
        {{ Form::label('start date') }}
        {{ Form::date('start_date') }}
    </div>
</section>

<section class="grid-x grid-margin-x cell large-auto">
    <div class="cell medium-shrink">
        {{ Form::label('end date') }}
        {{ Form::date('end_date') }}
    </div>
</section>

<section class="grid-x grid-margin-x cell large-6">
    {{ Form::label('location') }}
    {{ Form::text('location') }}
</section>

<section class="grid-x grid-margin-x cell large-6">
    {{ Form::label('side a') }}
    {{ Form::text('side_a') }}
</section>

<section class="grid-x grid-margin-x cell large-6">
    {{ Form::label('side b') }}
    {{ Form::text('side_b') }}
</section>

<section class="grid-x grid-margin-x cell large-6">
    {{ Form::label('territory') }}
    {{ Form::text('territory') }}
</section>
