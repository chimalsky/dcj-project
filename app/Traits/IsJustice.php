<?php

namespace App\Traits;

use App\History;
use App\Enums\HistoricPrecision;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait IsJustice
{
    use HasHistory;

    public function getHistoricPrecisionCodesAttribute()
    {
        return HistoricPrecision::toSelectArray();
    }
}
