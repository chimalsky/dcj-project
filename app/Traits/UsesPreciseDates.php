<?php

namespace App\Traits;

use Carbon\Carbon;

trait UsesPreciseDates
{
    public function getStartAttribute($value)
    {
        return $this->start_precision ? Carbon::parse($value) : null;
    }

    public function getEndAttribute($value)
    {
        return $this->end_precision ? Carbon::parse($value) : null;
    }

    /**
     * Model can access start date directly as attribute.
     */
    public function getStartYearAttribute()
    {
        return $this->start ? $this->start->format('Y') : null;
    }

    public function getStartMonthAttribute()
    {
        $precision = $this->start_precision ? strtolower($this->start_precision) : null;

        switch ($precision) {
            case 'high':
                return $this->start ? $this->start->format('n') : null;
                break;
            case 'medium':
                return $this->start ? $this->start->format('n') : null;
                break;
            default:
                return null;
        }
    }

    public function getStartDayAttribute()
    {
        $precision = $this->start_precision ? strtolower($this->start_precision) : null;
        switch ($precision) {
            case 'high':
                return $this->start ? $this->start->format('d') : null;
                break;
            default:
                return null;
        }
    }

    public function getEndYearAttribute()
    {
        return $this->end ? $this->end->format('Y') : null;
    }

    public function getEndMonthAttribute()
    {
        $precision = $this->end_precision ? strtolower($this->end_precision) : null;

        switch ($precision) {
            case 'high':
                return $this->end ? $this->end->format('n') : null;
                break;
            case 'medium':
                return $this->end ? $this->end->format('n') : null;
                break;
            default:
                return null;
        }
    }

    public function getEndDayAttribute()
    {
        $precision = $this->end_precision ? strtolower($this->end_precision) : null;

        switch ($precision) {
            case 'high':
                return $this->end ? $this->end->format('d') : null;
                break;
            default:
                return null;
        }
    }
}
