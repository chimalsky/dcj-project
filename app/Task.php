<?php

namespace App;

use App\Conflict;
use App\ConflictSeries;
use App\DyadicConflict;
use App\Justice;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ['id'];

    public function assigner()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function conflictEpisodes()
    {
        return $this->hasMany(Conflict::class, 'conflict_id', 'conflict_ucdp_id');
    }

    public function dyadicConflicts()
    {
        return $this->hasManyThrough(
            DyadicConflict::class,
            Conflict::class,
            'conflict_id',
            'conflictyear_id',
            'conflict_ucdp_id',
            'id'
        );
    }

    public function conflictJustices()
    {
        return $this->hasManyThrough(
            Justice::class,
            Conflict::class,
            'conflict_id',
            'conflict_id',
            'conflict_ucdp_id',
            'id'
        );
    }

    public function conflictSeries()
    {
        return $this->belongsTo(ConflictSeries::class, 'conflict_ucdp_id');
    }

    public function getRegionAttribute()
    {
        return $this->conflictEpisodes()->pluck('region')
            ->unique()
            ->mode();
    }

    public function getNameAttribute()
    {
        return $this->conflictSeries->name;
    }

    public function scopeRegion($query, $region)
    {
        return $query;
    }
}
