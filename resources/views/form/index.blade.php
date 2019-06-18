@extends('layouts.web')

@section('content')
<section class="grid-x grid-margin-y">
    @foreach ($forms as $form)
        <article class="cell grid-x grid-margin-x align-top">
            <h1 class="text-center cell">
                {{ $form->name }}
            </h1>

            <main class="cell medium-auto">
                @foreach ($form->items as $item)
                    @include('form.items.item', ['item' => $item])
                @endforeach
            </main>

            <aside class="cell medium-shrink callout">
                <h1 class="text-center">
                    User Interface Preview
                </h1>

                <div>
                    {!! $form->getMarkup() !!}
                </div>
            </aside>
          
        </article>
    @endforeach
</section>
@endsection