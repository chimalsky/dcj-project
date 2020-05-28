<?php

namespace App\Imports;

use App\Dyad;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DyadImport implements
    ToModel,
    WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Dyad([
            'id' => $row['new_id'],
            'old_id' => $row['old_id'],
            'name' => $row['name'],
        ]);
    }
}
