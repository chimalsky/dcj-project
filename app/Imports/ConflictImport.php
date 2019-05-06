<?php

namespace App\Imports;

use App\Conflict;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ConflictImport implements ToModel, 
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
        return new Conflict([
            'conflict_id' => $row['conflict_id'],
            'location' => $row['location'],

            'side_a' => $row['side_a'],
            'side_a_id' => $row['side_a_id'],

            'side_b' => substr($row['side_b'], 0, 254),
            'side_b_id' => $row['side_b_id'],

            'incompatibility' => $row['incompatibility'],
            'territory' => $row['territory_name'],
            'year' => $row['year'],
            'intensity' => $row['intensity_level'],
            'cumulative_intensity' => $row['cumulative_intensity'],
            'type' => $row['type_of_conflict'],

            'start_date' => $row['start_date'],
            'start_precision' => $row['start_prec'],
            
            'start_2_date' => $row['start_date2'],
            'start_2_precision' => $row['start_prec2'],

            'episode_ended' => $row['ep_end'],
            'episode_end_date' => $row['ep_end_date'],
            'episode_end_precision' => $row['ep_end_prec'],

            'gwno_a' => $row['gwno_a'],
            'gwno_b' => $row['gwno_b'],
            'gwno_location' => $row['gwno_loc'],

            'region' => $row['region']
        ]);
    }

    public function chunkSize(): int
    {
        return 400;
    }
}
