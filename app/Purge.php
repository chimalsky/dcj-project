<?php

namespace App;

use App\Traits\HasJustice;
use Illuminate\Database\Eloquent\Model;

class Purge extends Model
{
    // Deprecated. Leaving file in here until v2.0 just in case

    use HasJustice;

    public $type = 'purge';

    public $timestamps = false;

    protected $guarded = [
        'id'
    ];
}
