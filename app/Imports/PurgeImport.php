<?php

namespace App\Imports;

use App\Purge;
use Maatwebsite\Excel\Row;
use App\Imports\Traits\JusticeImport;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class PurgeImport implements OnEachRow,
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
        $type = 'purge';

        if ($row[$type] == 'No') {
            return null;
        }

        $dcj = Purge::create([
            'permanent' => $row['purge_perm'],
            'military' => $row['purge_mil'],
            'judiciary' => $row['purge_judiciary'],
            'civil_service' => $row['purge_civil'],
        ]);

        $dcj->save();
        $this->storeJustice($row, $dcj, $type);
    }

    public function chunkSize(): int
    {
        return 400;
    }
}
