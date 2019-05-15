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

    public function episodes()
    {
        return $this->hasMany(Conflict::class, 'conflict_id');
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

    public function getNameAttribute()
    {
        $episodes = $this->episodes()->select('side_a', 'side_b', 'year')->get();

        $sideA = $episodes->mode('side_a')[0];
        $sideB = $episodes->mode('side_b')[0];
        $yearMin = $episodes->min('year');
        $yearMax = $episodes->max('year');
        
        return "$sideA vs $sideB | $yearMin -- $yearMax";
    }
}
