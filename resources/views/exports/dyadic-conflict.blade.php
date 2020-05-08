<table>
    <thead>
    <tr>
        @foreach($headers as $header)
            <th>
                {{ $header }}
            </th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($dyadicConflicts as $dyadicConflict)
        @if ($dyadicConflict->justices()->exists())
            @foreach ($dyadicConflict->justices as $justice)
                @include('exports.justice-row', ['justice' => $justice, 'dyad' => $dyadicConflict])
            @endforeach
        @else 
            @include('exports.justice-row', ['justice' => null, 'dyad' => $dyadicConflict])
        @endif
    @endforeach
    </tbody>
</table>