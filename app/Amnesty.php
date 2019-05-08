<?php

namespace App;

use App\Traits\HasJustice;
use Illuminate\Database\Eloquent\Model;

class Amnesty extends Model
{
    use HasJustice;

    public $timestamps = false;

    public $type = 'amnesty';

    protected $guarded = [
        'id'
    ];
}
