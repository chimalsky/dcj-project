@extends('layouts.web')

@section('content')
<section class="grid-x grid-margin-y">
    @foreach ($forms as $form)
        <article class="cell grid-x grid-margin-x align-top">
            <h1 class="text-center cell">
                {{ $form->name }}
            </h1>

            <main class="cell medium-6 grid-x grid-margin-y">
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
                            <tr data-controller="togglable">
                                <td>
                                   {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->label }}
                                </td>
                                <td>
                                    <button data-action="togglable#toggle" 
                                        class="button hollow">
                                        edit
                                    </button>

                                    <div data-target="togglable.togglable">
                                        {{ html()->form('PUT', route(
                                            'form.update', $form
                                        ))->open() }}
                                            
                                            @foreach ($item->options as $option)
                                                {{ html()->text('name', $option, [
                                                    'data-action' => true
                                                    ]) 
                                                }}
                                            @endforeach

                                        {{ html()->form()->close() }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @foreach ($form->items as $item)
                    <div class="cell">
                        @include('form.items.item', ['item' => $item])
                    </div>
                @endforeach
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