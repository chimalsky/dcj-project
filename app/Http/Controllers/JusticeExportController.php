<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Justice as JusticeExport;
use App\Jobs\NotifyUserOfCompletedExport;

class JusticeExportController extends Controller
{
    public function export() 
    {
        return new JusticeExport();
        /*
        (new JusticeExport)->queue('dcj-data-download.xlsx')->chain([
            new NotifyUserOfCompletedExport(request()->user())
        ]);

        return redirect()->route('home')->with('status', "Your Excel File is being processed");*/


        //return Excel::download(new JusticeExport, 'dcj-data-download.xlsx');
    }

}
