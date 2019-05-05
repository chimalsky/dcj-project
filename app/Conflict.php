<?php

namespace App;

use App\Justice;
use Illuminate\Database\Eloquent\Model;

class Conflict extends Model
{
    protected $guarded = [
        'id'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('ucdp.table_names.conflicts'));
    }

    public function justices()
    {
        return $this->hasMany(Justice::class);
    }

}
