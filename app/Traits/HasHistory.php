<?php

namespace App\Traits;

use App\History;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorthToMany;

trait HasHistory
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
     * A model may have multiple histories.
     */
    public function histories(): MorphToMany
    {
        return $this->morphToMany(
            History::class,
            'model',
            'model_has_history',
            'model_id',
            'history_id'
        );
    }
}
