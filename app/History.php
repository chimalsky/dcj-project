<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorthTo;

class History extends Model
{
    protected $guarded = [
        'id'
    ];

    /**
     * Get all owning Models
     */
    public function historyable(): MorthTo
    {
        return $this->morphTo();
    }
}
