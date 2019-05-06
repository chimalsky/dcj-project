<?php

namespace App;

use App\CustomCasts\Enum;
use App\Enums\JusticeTarget;
use App\CustomCasts\EnglishBoolean;
use Illuminate\Database\Eloquent\Model;
use Vkovic\LaravelCustomCasts\HasCustomCasts;


class Justice extends Model
{   
    use HasCustomCasts;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'start' => 'date',
        'end' => 'date',

        'implemented' => EnglishBoolean::class,
        'civilian' => EnglishBoolean::class,
        'rank_and_file' => EnglishBoolean::class,
        'elite' => EnglishBoolean::class,

        'sender' => Enum::class,
        'scope' => Enum::class,

        'peace_initiated' => EnglishBoolean::class,

        /*'start_code' => Enum::class,
        'start_precision' => Enum::class,

        'end_code' => Enum::class,
        'end_precision' => Enum::class,*/


        'implemented' => EnglishBoolean::class,
        'target' => Enum::class
        
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
