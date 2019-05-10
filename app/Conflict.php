<?php

namespace App;

use DB;
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
        return $this->belongsTo(ConflictSeries::class);
    }

    public function justices()
    {
        return $this->hasMany(Justice::class);
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
