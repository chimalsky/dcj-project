<?php

namespace App\Imports;

use App\Trial;
use Maatwebsite\Excel\Row;
use App\Imports\Traits\JusticeImport;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class TrialImport implements OnEachRow,
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
        $type = 'trial';

        if ($row[$type] == 'No') {
            return null;
        }

        $trial = Trial::create([
            'domestic' => $row['trial_domestic'],
            'international' => $row['trial_intl'],
            'venue' => $row['trial_venue'],
            'absentia' => $row['trial_absentia'],
            'executed' => $row['trial_execute'],
            'breach' => $row['trial_breach']
        ]);

        $this->storeJustice($row, $trial);
    }

    public function chunkSize(): int
    {
        return 400;
    }
}
