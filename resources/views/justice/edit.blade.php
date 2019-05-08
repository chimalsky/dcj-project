@extends('layouts.web')

@section('content')

<header class="cell grid-x grid-padding-y">
    <a href="{{ route('conflict.index') }}" class="cell shrink button hollow">
        Return to List of Conflict Episodes
    </a>

    <a href="{{ route('conflict.show', $conflict) }}" class="cell">
        @include('conflict.title')
    </a>

    <strong class="cell">
        Editing {{ $justice->type }} DCJ
    </strong>

    @isset ($justice->dcjid)
        <p class="cell">
            <i>
                Dcjid code in Excel: {{ $justice->dcjid }}
            </i>
        </p>
    @endisset
</header>

{{ Form::model($justice, ['route' => ['justice.update', $justice->id], 'method' => 'put']) }}
    @include('forms.errors')

    <section class="cell">
        <main class="grid-x grid-padding-y">
            <section class="grid-x grid-margin-x grid-padding-y cell medium-9">
                @include('justice.form')
            </section>
        </main>
    </section>

    <section class="cell">
        <main class="grid-x grid-padding-y">
            <section class="grid-x grid-margin-x grid-padding-y cell medium-9">
                <header class="cell">
                    <strong>
                        {{ ucfirst($justice->type) }} DCJ
                    </strong>
                </header>

                <main class="cell callout success" style="height: 15rem">
                    Input Forms related to {{ ucfirst($justice->type) }} DCJ here

                    <br/><br/>
                    <i>
                        Why is this not here yet? Will this take long?
                    </i>
                    <p>
                        No. This part will utilize all the components i've built
                        for the shared DCJ data inputs. 
                    </p>
                    <p>
                        One part that potentially might take longer is the related Dcj 
                        information. That data can always be imported in the near future -- next week -- 
                        though so I've put that part off for now until we ensure the basic 
                        functionality of DCJ
                    </p>
                </main>

                <footer class="cell">
                    <input id="coding_notes" type="hidden" name="coding_notes"
                        value="{!! $justice->coding_notes !!}" />
                    <trix-editor input="coding_notes"></trix-editor>
                </footer>
            </section>
        </main>

        <footer class="grid-x grid-margin-x align-justify">
            <button class="button cell shrink">
                Save All Changes to {{ ucfirst($type) }} DCJ
            </button>

            <a href="{{ route('conflict.show', $conflict) }}" class="button hollow cell shrink">
                Cancel Changes without Saving
            </a>
        </footer>

        
    </section>
{{ Form::close() }}

@endsection