<?php

namespace App;

use App\Traits\HasJustice;
use Illuminate\Database\Eloquent\Model;

class Exile extends Model
{
    use HasJustice;

    public $timestamps = false;

    public $type = 'exile';

    protected $guarded = [
        'id'
    ];
}
