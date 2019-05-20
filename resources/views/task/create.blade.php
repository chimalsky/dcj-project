@extends('layouts.web')

@section('content')
    {{ Form::open(['route' => 'task.store']) }}
        @if ($errors->any())
            <div class="callout alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <section data-controller="form" class="grid-x grid-margin-x grid-margin-y align-top">
            <main class="cell auto grid-x grid-margin-y">
                <auto-complete src="{{ route('conflict-series.search') }}" aria-owns="conflict-series-popup" class="grid-x cell">
                    {{ Form::label('Search UCDP Conflict by Side A / Side B / Location / Territory / UCDP ID') }}

                    <input type="text" name="conflict_series">
                    <ul id="conflict-series-popup" class="cell grid-margin-y">
                    </ul>
                </auto-complete>

                {{ Form::label('team member') }}
                {{ Form::select('user', $users) }}

                @foreach ($users as $user)
                    <input type="checkbox" name="user" value="{{ $user }}" />
                @endforeach
            </main>

            <aside class="cell grid-x shrink">
                
            </aside>
        </section>

        <button class="button hollow">
            Assign This Task 
        </button>
    {{ Form::close() }}
@endsection