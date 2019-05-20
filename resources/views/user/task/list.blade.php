@foreach ($users as $user)
    <section class="cell grid-x list">
        <h1 class="cell text-center">
            {{ $user->name }} -- {{ $user->email }}
        </h1>
        <main class="cell">
            @foreach ($user->tasks as $task)
                @include('task.item', $task)
            @endforeach
        </main>
    </section>
@endforeach