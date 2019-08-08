<tr>
    <td>{{ route('justice.show', [
            'conflict' => $dyad->conflict->id,
            'justice' => $justice->id
        ])
        }}
    </td>
    <td>{{ $dyad->dyad_id  }}</td>
    <td>{{ $justice->conflict->conflict_id }}</td>
    <td>{{ $justice->conflict->old_conflict_id }}</td>
    <td>{{ $justice->conflict->location }}</td>

    <td>{{ $dyad->side_a }}</td>
    <td>{{ $dyad->side_a_id }}</td>
    <td>{{ $dyad->side_a_2nd }}</td>

    <td>{{ $dyad->side_b }}</td>
    <td>{{ $dyad->side_b_id }}</td>
    <td>{{ $dyad->side_b_2nd }}</td>

    <td>{{ $dyad->incompatibility }}</td>
    <td>{{ $dyad->territory }}</td>
    <td>{{ $dyad->year }}</td>
    <td>{{ $dyad->intensity }}</td>
    <td>{{ $dyad->type }}</td>
    <td>{{ $dyad->start_date }}</td>
    <td>{{ $dyad->start_2_date }}</td>
    <td>{{ $dyad->gwno_a }}</td>
    <td>{{ $dyad->gwno_a_2nd }}</td>
    <td>{{ $dyad->gwno_b_2nd }}</td>

    <td>{{ $dyad->gwno_location }}</td>
    <td>{{ $dyad->region }}</td>

    <td>18.1</td>

    <td>{{ $justice->dcjid }}</td>
    <td>{{ $dyad->dyad_id . '_' . $justice->dcjid }}</td>

    @if (isset($justice))
        @foreach ($types as $processType)
            <td>
                @if ($justice->type == $processType)
                    1
                @else
                    0
                @endif
            </td>

            @if ($justice->type == $processType)
                @include('exports.justice-items', $justice)
            @else
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>
            @endif

            @foreach($forms->firstWhere('name', $processType)->items->pluck('name') as $itemName)
                <td>
                    @if ($processType == $justice->type)
                        {{ $justice->getMeta($itemName) ?? null }}
                    @endif
                </td>
            @endforeach
        @endforeach
    @endif

</tr>