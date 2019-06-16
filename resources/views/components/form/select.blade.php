<div class="cell">
    <label>
        {{ $meta['label'] }}
    </label>
    {{ 
        Form::select(
            'meta[' . $meta['name'] . ']', 
            $meta['options'],
            null,
            ['placeholder' => '---']
        )
    }}
</div>