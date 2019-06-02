<?php

namespace App;

use DB;
use App\Dyad;
use App\Task;
use App\Justice;
use App\DyadidConflict;
use App\ConflictSeries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('type', function (Builder $builder) {
            $builder->where(config('ucdp.table_names.conflicts') . '.type', '!=', 2);
        });
    
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

    public function dyads()
    {
        return $this->hasMany(DyadicConflict::class, 'conflictyear_id')
            ->withCount('justices');
    }

    public function getRegionAttribute($value)
    {
        $dictionary = [
            "1" => "Europe",
            "2" => "Middle East",
            "3" => "Asia",
            "4" => "Africa",
            "5" => "Americas"
        ];

        $value = collect(explode(',', $value))->mode()[0];

        return $dictionary[$value];
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

    public function getIsPolydyadicAttribute()
    {
        return $this->dyads()->count() > 1;
    }
    
}
