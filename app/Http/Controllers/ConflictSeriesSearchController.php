<?php

namespace App\Http\Controllers;

use App\Conflict;
use App\ConflictSeries;
use Illuminate\Http\Request;

class ConflictSeriesSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('q');
        $conflictEpisodes = Conflict::where('side_a', 'like', "%$query%")
            ->orWhere('side_b', 'like', "%$query%")
            ->orWhere('territory', 'like', "%$query%")
            ->orWhere('location', 'like', "%$query%")
            ->orWhere('conflict_id', $query)
            ->get();

        $conflictIds = $conflictEpisodes->unique('conflict_id')->pluck('conflict_id');

        $conflictSeries = ConflictSeries::whereIn('id', $conflictIds)->get(); 

        return view('conflict-series.search.index', compact('conflictSeries'));
    }
}
