<?php

namespace App\Imports;

use App\Conflict;
use App\DyadicConflict;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class DyadicIntegrationTwo implements ToModel,
    WithHeadingRow,
    WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $conflictYear = Conflict::withoutGlobalScopes()->where([
            ['conflict_id', $row['conflict_id']],
            ['year', $row['year']]
        ])->first();

        return new DyadicConflict([
            'conflictyear_id' => $conflictYear->id,
            'year' => $row['year'],
            'dyad_id' => $row['dyad_id'],
            'location' => $row['location'],

            'side_a' => $row['side_a'],
            'side_a_id' => $row['side_a_id'],

            'side_b' => substr($row['side_b'], 0, 254),
            'side_b_id' => $row['side_b_id'],

            'incompatibility' => $row['incompatibility'],
            'territory' => $row['territory'],
            'intensity' => $row['intensity'],
            'type' => $row['type'],

            'start_date' => $row['start_date'],
            'start_precision' => $row['start_prec'],
            
            'start_2_date' => $row['start_date2'],
            'start_2_precision' => $row['start_prec2'],

            'gwno_a' => $row['gwno_a'],
            'gwno_a_2nd' => $row['gwno_a_2nd'],
            'gwno_b' => $row['gwno_b'],
            'gwno_b_2nd' => $row['gwno_b_2nd'],

            'gwno_location' => $row['gwno_loc'],

            'region' => $row['region']
        ]);
        
        
    }

    public function chunkSize(): int
    {
        return 400;
    }
}
