<?php

namespace App;

use DB;
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

    public function setOldConflictIdAttribute($value)
    {
        $translation = DB::table('translate_conflicts')
            ->where('new_id', $value)
            ->first();

        $this->attributes['old_conflict_id'] = $translation->old_id ?? null;
    }
}
