@extends('layouts.web')

@section('content')
<header class="grid-x grid-margin-x align-right">
    @can('create', 'App\User')
        <a href="{{ route('user.create') }}" class="cell shrink hollow button">
            Add a Team Member
        </a>
    @endcan
</header>

<section class="grid-x grid-margin-y grid-padding-y cell align-center">
    @if ( count($admins) )
        @include('user.panel', ['users' => $admins, 'role' => 'Admins'])
    @endif

    @if ( count($coders) )
        @include('user.panel', ['users' => $coders, 'role' => 'Coders'])
    @endif
</section>
@endsection