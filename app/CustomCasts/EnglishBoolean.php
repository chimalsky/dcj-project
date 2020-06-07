<?php

namespace App\CustomCasts;

use Vkovic\LaravelCustomCasts\CustomCastBase;

class EnglishBoolean extends CustomCastBase
{
    public function setAttribute($value)
    {
        if (! gettype($value) == 'string') {
            return $value;
        }

        $value = strtolower(trim($value));

        switch ($value) {
            case 'yes':
                return 1;
                break;
            case 'no':
                return 0;
                break;
            case 'n/a':
                return 2;
                break;
            case '':
                return null;
                break;
            case null:
                return null;
                break;
        }
    }

    public function castAttribute($value)
    {
        return $value; 

        if ($value === 1) {
            $value = 'yes';
        } elseif ($value === 0) {
            $value = 'no';
        } elseif ($value === 2) {
            $value = 'N/A';
        } else {
            return null;
        }

        return ucfirst($value);
    }
}
