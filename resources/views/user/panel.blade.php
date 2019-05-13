<div class="cell medium-9 large-7 grid-x grid-margin-y">
    <h1 class="cell">
        {{ $role }}
    </h1>

    <main class="cell grid-x grid-margin-x">
        @foreach ($users as $u)
            @include('user.card', ['user' => $u, 'cssClass' => 'cell medium-6'])
        @endforeach
    </main>
</div>