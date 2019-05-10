@extends('layouts.web')

@section('content')
<section class="grid-x grid-margin-y grid-padding-y cell align-center">
    @if ( count($admins) )
        <div class="cell medium-9 large-7 grid-x grid-margin-y">
            <h1 class="cell">
                Admins
            </h1>

            <main class="cell grid-x grid-margin-x">
                @foreach ($admins as $admin)
                    @include('user.card', ['user' => $admin, 'cssClass' => 'cell medium-6'])
                @endforeach
            </main>
        </div>
    @endif

    @if ( count($coders) )
        <div class="cell medium-9 large-7 grid-x grid-margin-y">
            <h1 class="cell">
                Coders
            </h1>

            <main class="cell grid-x grid-margin-x">
                @foreach ($coders as $coder)
                    @include('user.card', ['user' => $coder, 'cssClass' => 'cell medium-6'])
                @endforeach
            </main>
        </div>
    @endif
</section>
@endsection