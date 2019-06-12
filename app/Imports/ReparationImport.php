<?php

namespace App\Imports;

use App\Reparation;
use Maatwebsite\Excel\Row;
use App\Imports\Traits\JusticeImport;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class ReparationImport implements OnEachRow,
    WithHeadingRow,
    WithChunkReading
{
    use JusticeImport;

    /**
    * @param Row $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $row = $row->toArray();
        $type = 'rep';

        if ($row[$type] == 'No') {
            return null;
        }

        $dcj = Reparation::create([
            'property' => $row['rep_property'],
            'money' => $row['rep_money'],
            'training_education' => $row['rep_ed'],
            'community' => $row['rep_comm'],
            'funder' => $row['rep_fund']
        ]);

        $dcj->save();
        $this->storeJustice($row, $dcj, $type);
    }

    public function chunkSize(): int
    {
        return 400;
    }
}
