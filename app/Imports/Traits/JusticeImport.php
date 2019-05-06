<?php

namespace App\Imports\Traits;

use App\Justice;
use Carbon\Carbon;

Trait JusticeImport
{   
    protected $attributes
    /**
     * Store the justice and associate with
     * the relevant model
     */
    public function storeJustice($params, $type)
    {
        $justice = Justice::create([
            'implemented' => $params[$type . '_implement'],
            'target' => $params[$type . '_target'],
            'civilian' => $params[$type . '_crank'],
            'rank_and_file' => $params[$type . '_rrank'],
            'elite' => $params[$type . '_erank'],
            'sender' => $params[$type . '_sender'],
            'scope' => $params[$type . '_scope'],
            'scope_count' => $params[$type . '_scount'],
            'peace_initiated' => $params[$type . '_peacearg'],

            'start' => Carbon::parse($params[$type . '_syear'] . '-' 
                . $params[$type . '_smonth'] . '-' 
                . $params[$type . '_sday'],
            'start_code' => $params[$type . '_start'],
            'start_precision' => $params[$type . '_sprec'],

            'end' => Carbon::parse($params[$type . '_eyear'] . '-' 
                . $params[$type . '_emonth'] . '-' 
                . $params[$type . '_eday'],
            'end_code' => $params[$type . '_end'],
            'end_precision' => $params[$type . '_eprec'],


        ]);
        $this->justice()->associate($justice);
        $this->save();
    }
}