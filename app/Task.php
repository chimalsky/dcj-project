<?php

namespace App;

use App\User;
use App\Justice;
use App\Conflict;
use App\ConflictSeries;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [ 'id' ];

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

    public function conflictSeries()
    {
        return $this->belongsTo(ConflictSeries::class, 'conflict_ucdp_id');
    }
}