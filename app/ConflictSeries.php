<?php

namespace App;

use DB;
use App\User;
use App\Justice;
use App\Conflict;
use Illuminate\Database\Eloquent\Model;

class ConflictSeries extends Model
{
    protected $fillable = [
        'id'
    ];

    public $timestamps = false;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['episodes'];

    public function episodes()
    {
        return $this->hasMany(Conflict::class, 'conflict_id')->withCount('justices');
    }
    
    public function justices()
    {
        return $this->hasManyThrough(
            Justice::class, 
            Conflict::class,    
            'conflict_id',
            'conflict_id',
            'id',
            'id'
        );
    }   

    public function getSideAAttribute()
    {
        $sideAs = $this->episodes->pluck('side_a')->unique();

        return $sideAs->reduce(function($carry, $item) {
            if (strlen($carry)) {
                $carry .= " / ";
            }

            return $carry .= $item;
        }, '');
    }

    public function getSideBAttribute()
    {
        $sideBs = $this->episodes->pluck('side_b')->unique();

        return $sideBs->reduce(function($carry, $item) {
            if (strlen($carry)) {
                $carry .= " / ";
            }
            
            return $carry .= $item;
        }, '');
    }

    public function getYearsAttribute()
    {
        $yearMin = $this->episodes->min('year');
        $yearMax = $this->episodes->max('year');

        return $yearMin . " -- " . $yearMax;
    }

    public function getNameAttribute()
    {
        $episodes = $this->episodes;

        $sideA = $this->sideA;
        $sideB = $this->sideB;
        
        return "$sideA vs $sideB | " . $this->years;
    }

    
}
