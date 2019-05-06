<?php

namespace App;

use App\Traits\HasJustice;
use App\CustomCasts\EnglishBoolean;
use Illuminate\Database\Eloquent\Model;
use Vkovic\LaravelCustomCasts\HasCustomCasts;
use App\Enums\TrialHistoryEndCode as EndCodes;
use App\Enums\TrialHistoryStartCode as StartCodes;


class Trial extends Model
{
    use HasJustice, HasCustomCasts;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'domestic' => EnglishBoolean::class,
        'international' => EnglishBoolean::class,
        'absentia' => EnglishBoolean::class,
        'executed' => EnglishBoolean::class,
        'breach' => EnglishBoolean::class
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
