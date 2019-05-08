<?php

namespace App;

use App\Traits\HasJustice;
use Illuminate\Database\Eloquent\Model;

class Purge extends Model
{
    use HasJustice;

    public $type = 'purge';

    public $timestamps = false;

    protected $guarded = [
        'id'
    ];
}
