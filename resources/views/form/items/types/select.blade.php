<div class="cell">
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
