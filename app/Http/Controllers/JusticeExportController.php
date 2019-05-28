<?php

namespace App\Http\Controllers;

use App\Exports\DcjExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JusticeExportController extends Controller
{
    public function export() 
    {
        return Excel::download(new DcjExport, 'dcj-data-download.xlsx');
    }

}
