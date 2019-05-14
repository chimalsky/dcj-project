<?php

namespace App\Imports;

use App\Conflict;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class DyadicIntegration implements OnEachRow,
    WithHeadingRow,
    WithChunkReading
{

    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();

        $conflictYear = Conflict::where([
            ['conflict_id', $row['conflict_id']],
            ['year', $row['year']]
        ])->first();

        $conflictYear->dyad_id = $row['dyad_id'];
        $conflictYear->save();
    }

    public function chunkSize(): int
    {
        return 400;
    }
}
