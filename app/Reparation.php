<?php

namespace App;

use App\Traits\HasJustice;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    // Deprecated. Leaving file in here until v2.0 just in case
    use HasJustice;

    public $timestamps = false;

    public $type = 'reparation';

    protected $guarded = [
        'id'
    ];
}
