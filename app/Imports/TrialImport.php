<?php

namespace App\Imports;

use App\Trial;
use Maatwebsite\Excel\Concerns\ToModel;

class TrialImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Trial([
            //
        ]);
    }
}
