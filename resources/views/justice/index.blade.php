@extends ('layouts.web')

@section ('content')
    @foreach ($justices as $justice) 
        @include('justice.item', $justice)
    @endforeach
@endsection