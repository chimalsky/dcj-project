<article class="cell grid-x grid-margin-y">
    @foreach ($form->items as $item)
        @if (!isset($item->type))
            @include('form.items.types.englishBoolean', [
                'name' => 'items[' . $item['name'] . ']',
                'model' => $model ?? null,
                'label' => $item['label'],
                'labels' => $item['options']
            ])
        @elseif ($item->type == 'dropdown')
            @include('form.items.types.select', ['item' => $item])
        @endif
    @endforeach
</article>