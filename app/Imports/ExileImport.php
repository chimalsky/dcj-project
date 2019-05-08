<?php

namespace App\Imports;

use App\Exile;
use Maatwebsite\Excel\Row;
use App\Imports\Traits\JusticeImport;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class ExileImport implements OnEachRow,
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
        $type = 'exile';

        if ($row[$type] == 'No') {
            return null;
        }

        $dcj = Exile::create([
            'permanent' => $row['exile_perm'],
        ]);

        $dcj->save();
        $this->storeJustice($row, $dcj, $type);
    }

    public function chunkSize(): int
    {
        return 400;
    }
}
