<?php

namespace App\Imports;

use App\Amnesty;
use App\Imports\Traits\JusticeImport;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class AmnestyImport implements
    OnEachRow,
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
        $type = 'amnesty';

        if ($row[$type] == 'No') {
            return null;
        }

        $dcj = Amnesty::create([
            'limited' => $row['amnesty_lim'],
            'unconditional' => $row['amnesty_uncon'],
        ]);

        $dcj->save();
        $this->storeJustice($row, $dcj, $type);
    }

    public function chunkSize(): int
    {
        return 400;
    }
}
