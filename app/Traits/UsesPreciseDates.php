<?php

namespace App\Traits;

trait UsesPreciseDates
{
    /**
     * Model can access start date directly as attribute
     */
    public function getStartYearAttribute()
    {
        return $this->start ? $this->start->format('Y') : null;
    }

    public function getStartMonthAttribute()
    {
        $precision = strtolower($this->start_precision);

        switch ($precision) {
            case 'high':
                return $this->start->format('m');
                break;
            case 'medium':
                return $this->start->format('m');
                break;
            default:
                return null;
        }
    }

    public function getStartDayAttribute()
    {
        $precision = strtolower($this->start_precision);

        switch ($precision) {
            case 'high':
                return $this->start->format('d');
                break;
            default:
                return null;
        }
    }

    public function formStartMonthAttribute()
    {
        return 10;
    }

    public function getEndYearAttribute()
    {
        return $this->end ? $this->end->format('Y') : null;
    }

    public function getEndMonthAttribute()
    {
        $precision = strtolower($this->end_precision);

        switch ($precision) {
            case 'high':
                return $this->end->format('m');
                break;
            case 'medium':
                return $this->end->format('m');
                break;
            default:
                return null;
        }
    }

    public function getEndDayAttribute()
    {
        $precision = strtolower($this->end_precision);

        switch ($precision) {
            case 'high':
                return $this->end->format('d');
                break;
            default:
                return null;
        }
    }

}
