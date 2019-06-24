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
    @foreach($justices as $justice)
        @foreach ($justice->dyadicConflicts as $dyad)
            @include('exports.justice-row', ['justice' => $justice, 'dyad' => $dyad])
        @endforeach
    @endforeach
    </tbody>
</table>