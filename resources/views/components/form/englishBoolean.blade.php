<section class="cell grid-x english-boolean">
    <header class="cell">
        {{ $label }}
    </header>

    <div data-controller="radio-group"
        class="cell grid-x grid-margin-x">

        {{ $model->getMetas() }}
        
        {{ $model->getFoobar() }}
    </div>
</section>