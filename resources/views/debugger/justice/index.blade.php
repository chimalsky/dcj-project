@extends('layouts.web')

@section('content')
<main class="grid-x grid-margin-x grid-margin-y">
    <header class="cell">
        Here are a list of DCJs that may have bugs in the Side_A and Side_B attributes. 
    </header>

    @foreach ($justices as $justice)
        <div class="cell medium-6 large-4">
            @include('justice.card-simple', ['justice' => $justice, 'conflict' => $justice->conflict, 
            'attributes' => [
                'sender' => $justice->sender,
                'target' => $justice->target
            ]])

        </div>
    @endforeach
</main>
@endsection