<?php

namespace App\Exports;

use App\Form;
use App\DyadicConflict;
use App\Justice as Model;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class Justice implements FromView, Responsable
{
    use Exportable;

    /**
    * It's required to define the fileName within
    * the export class when making use of Responsable.
    */
    private $fileName = 'dcj-data-download.xlsx';

    public function __construct()
    {
        $this->types = Form::all()->pluck('name');
    }

    public function view(): View 
    {
        $dyadicConflicts = DyadicConflict::with('justices', 'conflict')->get();
        $justices = Model::with('conflict')->withMeta()
            ->limit(100)
            ->get();

        $forms = Form::all();

        return view('exports.dyadic-conflict', [
            'forms' => $forms,
            'headers' => $this->getHeaders(),
            'types' => $this->types,
            'justices' => $justices,
            'dyadicConflicts' => $dyadicConflicts
        ]);
    }

    public function query()
    {
        return Model::query();
    }

    public function map($justice) : array
    {
        $headers = collect($this->headers);

        $row = $headers->map(function($header) use ($justice) {
            return $justice->$header ?? null;
        });
        
        $row->toArray();
    }

    public function headings(): array
    {
        return $this->getHeaders();
    }

    public function getJusticeSpecificHeader($type)
    {
        $headers = [
            'sday',
            'smonth',	
            'syear',
            'sprec',
            'eday',
            'emonth',
            'eyear',	
            'eprec',
            'target',
            'crank',
            'rrank',
            'erank',
            'sender',
            'scope',
            'scount',
            'implement',
            'rDCJ',
            'wrong',
            'gender',	
            'sexviol',
            'peaceagr',
            'start',
            'end'
        ];

        $headers = collect($headers)->map(function($header) use ($type) {
            return $type . "_" . $header;
        });

        $headers->prepend($type);

        $form = Form::where('name', $type)->first();

        $form->items->each(function($item) use ($headers, $type) { 
           
            $headers->push($type . '_' . $item->name );
        });
        
        return $headers->toArray();
    }

    public function getHeaders()
    {
        $headers = [
            'dcj_url',
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
            'type', 
            'start_date',	
            'start_date2',
            'gwno_a',	
            'gwno_a_2nd',
            'gwno_b_2nd', 
            'gwno_loc',
            'region',
            'version',
            'dcjid',
            'dcjidd'
        ];

        foreach ($this->types as $type) {
            $headers = array_merge($headers, $this->getJusticeSpecificHeader($type));
        }

        return $headers;
    }
    
}
