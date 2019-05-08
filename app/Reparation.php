<?php

namespace App;

use App\Traits\HasJustice;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasJustice;

    public $timestamps = false;

    public $type = 'reparation';

    protected $guarded = [
        'id'
    ];
}
