<?php

namespace App;

use DB;
use App\Dyad;
use App\Task;
use App\Justice;
use App\ConflictSeries;
use Illuminate\Database\Eloquent\Model;

class Conflict extends Model
{
    protected $guarded = [
        'id'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('ucdp.table_names.conflicts'));
    }

    public function series()
    {
        return $this->belongsTo(ConflictSeries::class, 'conflict_id');
    }

    public function justices()
    {
        return $this->hasMany(Justice::class);
    }

    public function dyad()
    {
        return $this->belongsTo(Dyad::class);
    }

    public function getJusticesSelectAttribute()
    {
        return $this->justices->pluck('dcjid', 'dcjid');
    }

    public function setOldConflictIdAttribute($value)
    {
        $translation = DB::table('translate_conflicts')
            ->where('new_id', $value)
            ->first();

        $this->attributes['old_conflict_id'] = $translation->old_id ?? null;
    }

    public function getNameAttribute()
    {
        return "$this->year $this->side_a vs. $this->side_b";
    }
    
}
