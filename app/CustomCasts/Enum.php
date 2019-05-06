<?php

namespace App\CustomCasts;

use Str;
use Illuminate\Database\Eloquent\Model;
use Vkovic\LaravelCustomCasts\CustomCastBase;

class Enum extends CustomCastBase
{
    protected $enum;

    public function __construct(Model $model, $attribute)
    {
        parent::__construct($model, $attribute);

        $enumClassName = "\App\Enums\\" 
            . class_basename($model) 
            . ucfirst($attribute);

        if (!class_exists($enumClassName)) {
            $exploded = explode('_', $attribute);

            $enumClassName = "\App\Enums\\"
                . class_basename($model)
                . ucfirst(end($exploded));
        }

        if (!class_exists($enumClassName)) {
            $enumClassName = "\App\Enums\\"
                . class_basename('Trial')
                . Str::studly($attribute);
        }
       
        $this->enum = $enumClassName;
    }

    public function setAttribute($value)
    {        
        $value = str_replace(' ', '_', $value);
        $value = Str::before($value, '/');

        return $this->enum::toArray()[$value] ?? null;
    }

    public function castAttribute($value)
    {
        return $this->enum::getKey((int)$value) ?? null;
    }
}