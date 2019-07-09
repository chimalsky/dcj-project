<?php

namespace App\Http\Controllers;

use App\Justice;
use Illuminate\Http\Request;

class JusticeDebuggerController extends Controller
{
    public function index()
    {
        $justices = Justice::has('conflict')
            ->whereRaw('updated_at > ADDTIME(created_at, 5)')
            ->whereNotNull('user_id')
            ->get();

        return view('debugger.justice.index', compact('justices'));
    }
}
