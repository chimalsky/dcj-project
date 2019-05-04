<?php

namespace App;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasHistory;

    protected $guarded = [
        'id'
    ];
}
