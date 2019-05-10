<article class="user card @isset($cssClass) {{ $cssClass }} @endisset">
    <h1>
        {{ $user->name }}
    </h1>
    <h2>
        {{ $user->email }}
    </h2>

    @if (Auth::user()->role == 'admin')
        {{ Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) }}
            {{ Form::label('role') }}
            {{ Form::select('role', ['admin' => 'admin', 'coder' => 'coder'], $user->role, ['placeholder' => 'assign a role']) }}

            <footer class="grid-x align-right">
                <button class="button hollow">
                    Save
                </button>
            </footer>
        {{ Form::close() }}
    @endif
</article>
