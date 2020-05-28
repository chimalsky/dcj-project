<?php

namespace App\Http\Controllers;

use App\Exports\Justice as JusticeExport;
use App\Jobs\NotifyUserOfCompletedExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JusticeExportController extends Controller
{
    public function export()
    {

       /* $fileName = 'public/data/dcj-download_' . html_entity_decode(Carbon::now()) . '.xlsx';

        (new JusticeExport)->queue($fileName)->chain([
            //new NotifyUserOfCompletedExport(request()->user(), $fileName)
        ]); */

        return Excel::download(new JusticeExport, 'dcj-download_'.html_entity_decode(Carbon::now()).'.xlsx');

        //return back()->with('status', 'Justice Data is being processed. You will receive an email when it is complete');
    }
}
