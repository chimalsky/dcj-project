<?php

namespace App\Traits;

use App\Episode;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasEpisodes
{
    public static function bootHasHistory()
    {
        static::deleting(function ($model) {
            if (method_exists($model, 'isForceDeleting') && ! $model->isForceDeleting()) {
                return;
            }

            //$model->roles()->detach();
        });
    }

    /**
     * A model has a history.
     */
    public function history(): MorphOne
    {
        return $this->morphOne(History::class, 'historyable');
    }

    /**
     * Model can access start date directly as attribute
     */
    public function getStartDateAttribute()
    {
        return $this->history->start;
    }

    /**
     * Model can access end date directly as attribute
     */
    public function getEndDateAttribute()
    {
        return $this->history->end;
    }
}
