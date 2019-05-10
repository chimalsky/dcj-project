@extends('layouts.web')

@section('content')
<section class="grid-x cell align-center">
    @if ( count($admins) )
        <div class="cell medium-9 large-7 grid-x grid-margin-x">
            <h1 class="cell">
                Admins
            </h1>

            @foreach ($admins as $admin)
                @include('user.card', ['user' => $admin, 'cssClass' => 'cell medium-6'])
            @endforeach
        </div>
    @endif

    @if ( count($coders) )
        <div class="cell medium-9 large-7 grid-x grid-margin-x">
            <h1 class="cell">
                Coders
            </h1>

            @foreach ($coders as $coder)
                @include('user.card', ['user' => $coder, 'cssClass' => 'cell medium-6'])
            @endforeach
        </div>
    @endif
</section>
@endsection