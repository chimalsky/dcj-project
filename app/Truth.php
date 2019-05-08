<?php

namespace App;

use App\Traits\HasJustice;
use Illuminate\Database\Eloquent\Model;

class Truth extends Model
{
    use HasJustice;

    public $timestamps = false;

    public $type = 'truth';

    protected $guarded = [
        'id'
    ];
}
