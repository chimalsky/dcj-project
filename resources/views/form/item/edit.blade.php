{{ html()->form('PUT', route(
    'form.item.update', [
        'form' => $item->form,
        'item' => $item
    ]
))->open() }}
    
    <label>
        Options
    </label>

    @foreach ($item->options as $option)
        
        {{ 
            html()->text('options', $option)->attributes([
                'data-action' => ''
            ]) 
        }}
    @endforeach

{{ html()->form()->close() }}

{{
    html()->form('DELETE', route('form.item.destroy', 
        [
            'form' => $item->form, 
            'item' => $item
        ])
    )->open() 
}}

    <button class="button alert">
        Delete this Item
    </button>
{{ html()->form()->close() }}