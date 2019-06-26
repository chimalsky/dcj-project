<?php

namespace App\Imports;

use App\Form;
use App\Justice;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class HelgaColumnsImport implements OnEachRow,
    ShouldQueue,
    WithHeadingRow,
    WithChunkReading
{
    public function onRow(Row $row)
    {
        $types = collect([
            'trial',
            'truth',
            'rep',
            'amnesty',
            'purge',
            'exile'
        ]);

        $rowIndex = $row->getIndex();
        $row      = $row->toArray();

        $dcjid = $row['dcjid'];

        if (! $dcjid) {
            return;
        }

        $type = $types->first(function($type) use ($row) {
            return $row[$type];
        });

        if (! $type) {
            return; 
        }

        $justice = Justice::where('dcjid', $dcjid)->first();

        if (!$justice) {
            return;
        }

        $justice->wrong = $row[$type .'_wrong'];
        $justice->gender = $row[$type . '_gender'];
        $justice->sexviolence = $row[$type . '_sexviol'];

        if ($type == 'purge') {
            $justice->setMeta('purge', $row[$type . '_political']);
        }

        $justice->save();
    }

    public function chunkSize(): int
    {
        return 400;
    }
}
