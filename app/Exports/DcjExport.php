<?php

namespace App\Exports;

use App\Justice;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class DcjExport implements FromQuery, WithMapping
{
    public function headings(): array
    {
        return [
            'dyad_id',
            'conflict_id',
            'old_id',
            'location',
            'side_a',
            'side_a_id',
            'side_a_2nd',
            'side_b',
            'side_b_id',
            'side_b_2nd',
            'incompatibility',
            'territory',
            'year',
            'intensity',
            'type'
        ];
    }

    /**
    * @var Justice $invoice
    */
    public function map($dcj): array
    {
        
        return [
            $invoice->invoice_number,
            Date::dateTimeToExcel($invoice->created_at),
        ];
    }
}
