<article>
    @foreach ($form->items as $item)
        @if (!isset($item->type))
            @include('form.items.englishBoolean', [
                'name' => 'items[' . $item['name'] . ']',
                'model' => null,
                'label' => $item['label'],
                'labels' => $item['options']
            ])
        @elseif ($item->type == 'dropdown')
        @endif
    @endforeach
</article>