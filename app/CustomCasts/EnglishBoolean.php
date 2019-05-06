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
        
        return strtolower(trim($value)) == 'yes';
    }

    public function castAttribute($value)
    {
        return ucfirst($value);
    }
}