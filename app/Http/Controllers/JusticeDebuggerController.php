<?php

namespace App\Http\Controllers;

use App\Justice;
use Illuminate\Http\Request;

class JusticeDebuggerController extends Controller
{
    public function index()
    {
        $justices = Justice::has('conflict')
            ->where('updated_at', '<', '2019-07-09 09:00:00')
            ->whereRaw('updated_at > ADDTIME(created_at, 5)')
            ->whereNotNull('user_id')
            ->latest('updated_at')
            ->get();

        return view('debugger.justice.index', compact('justices'));
    }
}
