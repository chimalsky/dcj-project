@extends('layouts.web')

@section('content')

<table>
<thead>
    <tr>
        <th>
            Conflict ID
        </th>
        <th>
            Location
        </th>
        <th>
            Territory
        </th>

        <th>
            Year
        </th>
        
        <th>
            Side A 
        </th>
        <th>
            Side B 
        </th>
        <th>
            Justice Count
        </th>
    </tr>
</thead>

<tbody>
    @foreach ($conflicts as $conflict)
    <tr>
        <td>
            <a href="{{ route('conflict.show', $conflict) }}">
                {{ $conflict->conflict_id }}
            </a>
        </td>
        <td>
            {{ $conflict->location }}
        </td>
        <td>
            {{ $conflict->territory }}
        </td>
        <td>
            {{ $conflict->year }}
        </td>
        
        <td>
            {{ $conflict->side_a }}
        </td>
        <td>
            {{ $conflict->side_b }}
        </td>
        <td>
            {{ $conflict->justices }}
        </td>
    </tr>
    @endforeach
</tbody>

    {{ $conflicts->links() }}
@endsection