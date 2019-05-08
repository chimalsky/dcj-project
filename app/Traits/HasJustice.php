<?php

namespace App\Traits;

use App\Justice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasJustice
{
    
    /**
     * A model has justice case.
     */
    public function justice()
    {
        return $this->morphOne(Justice::class, 'justiceable');
    }

    public function relatedJusticeCases()
    {
        return $this->belongsToMany(Justice::class);
    }

    /**
     * Model can access start date directly as attribute
     */
    public function getStartDateAttribute()
    {
        return $this->justice->start;
    }

    /**
     * Model can access end date directly as attribute
     */
    public function getEndDateAttribute()
    {
        return $this->justice->end;
    }
}
