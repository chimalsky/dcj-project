{{ html()->form('PUT', route(
    'form.item.update', [
        'form' => $item->form,
        'item' => $item
    ]
))->open() }}
    
    <label>
        Options
    </label>

    @if (!$item->type)
        @foreach (collect($item->options)->reverse() as $option)
            {{ 
                html()->text('options', $option)->attributes([
                    'data-action' => ''
                ]) 
            }}
        @endforeach
    @else
        @foreach (collect($item->options) as $option)
            {{ 
                html()->text('options', $option)->attributes([
                    'data-action' => ''
                ]) 
            }}
        @endforeach
    @endif

{{ html()->form()->close() }}

{{
    html()->form('DELETE', route('form.item.destroy', 
        [
            'form' => $item->form, 
            'item' => $item
        ])
    )->open() 
}}

    <input type="hidden" name="name" value="{{ $item->name }}"" />

    <button class="button alert">
        Delete this Item
    </button>
{{ html()->form()->close() }}