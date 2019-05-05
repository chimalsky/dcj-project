<?php

namespace App\Traits;

use App\History;
use App\Conflict;
use App\Enums\HistoricPrecision;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait IsJustice
{
    use HasHistory;

    public function justice()
    {
        return $this->belongsTo(self::class, 'related_justice_id');
    }
    
    public function justiceable()
    {
        return $this->morphsTo()
    }

    public function conflict()
    {
        return $this->belongsTo(Conflict::class);
    }

    public function getDcjIdAttribute()
    {
        $conflict = $this->conflict;
        $dcjIndex = $conflict->justices()->where('type', $this->type)
            ->search($this->id);

        if ($dcjIndex === false) {
            $dcjIndex = 1;  
        }

        return "$this->id_$this->incidentYear_$this->type_$dcjIndex";
    }

    public function getHistoricPrecisionCodesAttribute()
    {
        return HistoricPrecision::toSelectArray();
    }

    public function getTypeAttribute()
    {
        return strtoupper($this->type);
    }
}
