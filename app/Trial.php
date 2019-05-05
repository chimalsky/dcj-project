<?php

namespace App;

use App\Traits\HasJustice;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TrialHistoryEndCode as EndCodes;
use App\Enums\TrialHistoryStartCode as StartCodes;

class Trial extends Model
{
    use HasJustice;

    protected $guarded = [
        'id'
    ];

    protected $type = 'T';

    public function getStartCodesAttribute()
    {
        return StartCodes::toSelectArray();
    }
    public function getEndCodesAttribute()
    {
        return EndCodes::toSelectArray();
    }
} 
