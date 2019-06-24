<div class="cell medium-6">
    <label>
        {{ $item->label }}
    </label>
    {{ 
        Form::select(
            'items[' . $item->name . ']', 
            $item->options,
            null,
            ['placeholder' => '---']
        )
    }}
</div>
