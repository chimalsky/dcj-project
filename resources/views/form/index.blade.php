@extends('layouts.web')

@section('content')
<section class="grid-x grid-margin-y">
    @foreach ($forms as $form)
        <article class="cell grid-x grid-margin-x align-top">
            <h1 class="text-center cell">
                {{ $form->name }}
            </h1>

            <main data-controller="form-edit" 
                class="cell medium-6 grid-x grid-margin-y">

                <section data-controller="togglable">
                    <button data-action="togglable#toggle" class="button">
                        Add Item
                    </button>

                    <div data-target="togglable.togglable">
                        @include('form.item.create', ['form' => $form])
                    </div>
                </section>

                <table class="table">
                    <thead>
                        <th>
                            Name
                        </th>
                        <th>
                            Label
                        </th>
                        <th>
                            
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($form->items as $item)
                            @include('form.item.row', ['item' => $item])
                        @endforeach
                    </tbody>
                </table>
            </main>

            <aside class="cell grid-x medium-6 callout">
                <h1 class="text-center cell">
                    User Interface Preview
                </h1>

                <div class="cell">
                    {!! $form->getMarkup() !!}
                </div>
            </aside>
          
        </article>
    @endforeach
</section>
@endsection