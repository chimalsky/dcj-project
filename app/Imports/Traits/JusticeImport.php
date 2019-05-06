<?php

namespace App\Imports\Traits;

use App\Justice;
use Carbon\Carbon;

Trait JusticeImport
{   
    /**
     * Store the justice and associate with
     * the relevant model
     */
    public function storeJustice($params, $model)
    {
        $type = $model->type;

        $startDate = Carbon::create($params[$type . '_syear'],
        strlen(substr($params[$type . '_smonth'], 0, 2)) ? substr($params[$type . '_smonth'], 0, 2) : null,
        strlen(substr($params[$type . '_sday'], 0, 2)) ? substr($params[$type . '_sday'], 0, 2) : null
        );

        $endDate = Carbon::create($params[$type . '_eyear'],
            strlen(substr($params[$type . '_emonth'], 0, 2)) ? substr($params[$type . '_emonth'], 0, 2) : null,
            strlen(substr($params[$type . '_eday'], 0, 2)) ? substr($params[$type . '_eday'], 0, 2) : null
        );

      /*  $justice = Justice::create([
            'implemented' => $params[$type . '_implement'],
            'target' => $params[$type . '_target'],
            'civilian' => $params[$type . '_crank'],
            'rank_and_file' => $params[$type . '_rrank'],
            'elite' => $params[$type . '_erank'],
            'sender' => $params[$type . '_sender'],
            'scope' => $params[$type . '_scope'],
            'scope_count' => $params[$type . '_scount'],
            'peace_initiated' => $params[$type . '_peacearg'],

            'start' => $startDate,
            'start_code' => $params[$type . '_start'],
            'start_precision' => $params[$type . '_sprec'],

            'end' => $endDate,
            'end_code' => $params[$type . '_end'],
            'end_precision' => $params[$type . '_eprec'],

            'coding_notes' => $params[$type .'_text']
        ]);*/

        $model->justice()->create([
            'implemented' => $params[$type . '_implement'],
            'target' => $params[$type . '_target'],
            'civilian' => $params[$type . '_crank'],
            'rank_and_file' => $params[$type . '_rrank'],
            'elite' => $params[$type . '_erank'],
            'sender' => $params[$type . '_sender'],
            'scope' => $params[$type . '_scope'],
            'scope_count' => $params[$type . '_scount'],
            'peace_initiated' => $params[$type . '_peacearg'],

            'start' => $startDate,
            'start_code' => $params[$type . '_start'],
            'start_precision' => $params[$type . '_sprec'],

            'end' => $endDate,
            'end_code' => $params[$type . '_end'],
            'end_precision' => $params[$type . '_eprec'],

            'coding_notes' => $params[$type .'_text']
        ]);

        $model->save();
    }
}