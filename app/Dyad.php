<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dyad extends Model
{
    protected $table = 'ucdp_dyads';
    
    protected $fillable = [
        'id', 'old_id', 'name'
    ];

    public $timestamps = false;
}
