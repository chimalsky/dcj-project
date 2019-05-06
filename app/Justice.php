<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Justice extends Model
{   
    protected $guarded = [
        'id'
    ];
    
    /**
     * A justice model can be associated with other justice models
     */
    /*public function relatedJustices()
    {
        return $this->belongsToMany(Justice::class, );
    }*/

    public function justiceable()
    {
        return $this->morphTo();
    }

    public function getDcjIdAttribute()
    {
        //$conflict = $this->conflict;
       // return "$this->id_$this->incidentYear_$this->type_$this->foobarCount";
    }
}
