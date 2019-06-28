@extends('layouts.web')

@section('content')
<ul class="cell menu grid-x grid-margin-x align-center text-center">    
    @foreach (App\Justice::possibleForms() as $possibleForm)
        <li class="@if ($form->name == $possibleForm->name) is-active @endif">
            <a href="{{ route('form.edit', $possibleForm) }}"
                class="cell shrink">
                {{ ucwords($possibleForm->schema['name']) }}
            </a>
        </li>
    @endforeach
</ul>


<section class="grid-x grid-margin-y">
        <article class="cell grid-x grid-margin-x grid-margin-y align-top">

            <header class="cell grid-x grid-margin-x">
                {{ html()->modelForm($form, 'PUT', route('form.update', $form))->open() }}
                    <label class="cell">
                        <span>Process Name: </span>
                        {{ html()->text("schema[name]") }}
                    </label>


                    <label class="cell">
                        <span>Excel Prefix: </span>
                        {{ html()->text("schema[excel.prefix]") }}
                    </label>

                
                    <button class="button hollow">
                        Save this Form
                    </button>
                {{ html()->closeModelForm() }}
            </header>

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
</section>
@endsection