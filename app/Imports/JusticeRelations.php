<?php

namespace App\Imports;

use App\Justice;
use Maatwebsite\Excel\Row;
use App\Imports\Traits\JusticeImport;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class JusticeRelations implements OnEachRow,
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

        $types = [
            'exile',
            'truth',
            'trial',
            'rep',
            'purge',
            'amnesty'
        ];

        $relationalKey = '_rdcj';
        $dcjid = null;

        foreach ($types as $type) {
            $key = $type . $relationalKey;
            $dcjId = $row[]
            var_dump($key);


            if ($row[$key]) {
                $dcjid = $row[$key];

                $related = Justice::where('dcjid', $dcjid)->first();
                return
            }
        }
    }

    public function chunkSize(): int
    {
        return 400;
    }
}
