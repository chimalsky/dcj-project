<div class="cell">
    <label>
        {{ $meta['label'] }}
    </label>
    {{ 
        Form::select(
            'items[' . $meta['name'] . ']', 
            $meta['options'],
            null,
            ['placeholder' => '---']
        )
    }}
</div>