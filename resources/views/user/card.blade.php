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
                <button class="button hollow tiny">
                    Save
                </button>
            </footer>
        {{ Form::close() }}
    @endif

                <form id="delete-form" action="{{ route('user.destroy', $user) }}" method="POST" style="display: none;">
                    @method('delete')
                    @csrf

                    <input type="hidden" name="user" value="{{ $user->id }}"/>
                </form>
    @can('delete', $user)
            <aside class="cell grid-x align-right">

                <a href="{{ route('user.destroy', $user) }}"
                    class="button alert tiny"
                    onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();">
                    Remove from Team
                </a>
            </aside>
    @endcan
</article>
