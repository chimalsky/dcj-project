<?php

namespace App;

use App\CustomCasts\EnglishBoolean;
use App\Enums\TrialHistoryEndCode as EndCodes;
use App\Enums\TrialHistoryStartCode as StartCodes;
use App\Traits\HasJustice;
use Illuminate\Database\Eloquent\Model;
use Vkovic\LaravelCustomCasts\HasCustomCasts;

class Trial extends Model
{
    // Deprecated. Leaving file in here until v2.0 just in case

    use HasJustice, HasCustomCasts;

    public $timestamps = false;

    public $type = 'trial';

    protected $guarded = [
        'id',
    ];

    protected $casts = [

    ];

    public function getStartCodesAttribute()
    {
        return StartCodes::toSelectArray();
    }

    public function getEndCodesAttribute()
    {
        return EndCodes::toSelectArray();
    }
}
