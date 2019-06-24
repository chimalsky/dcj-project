<article class="cell grid-x grid-margin-y">
    @foreach ($form->items as $item)
        @if (!isset($item->type) || $item->type == 'englishBoolean')
            @include('form.item.types.englishBoolean', [
                'name' => 'items[' . $item['name'] . ']',
                'model' => $model ?? null,
                'label' => $item['label'],
                'options' => $item['options']
            ])
        @elseif ($item->type == 'dropdown')
            @include('form.item.types.select', ['item' => $item])
        @endif
    @endforeach
</article>