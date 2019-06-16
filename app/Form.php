<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\SchemalessAttributes;

class Form extends Model
{
    protected $guarded = ['id'];

    public $casts = [
        'schema' => 'array',
    ];

    public function getItemsAttribute() 
    {
        return collect($this->schema->get('meta'));
    }

    public function filterParams($params) 
    {
        return $this->items->mapWithKeys(function($item) use ($params) {
            return [
                $item['name'] => $params[$item['name']] ?? null
            ];
        });
    }

    public function getSchemaAttribute(): SchemalessAttributes
    {
        return SchemalessAttributes::createForModel($this, 'schema');
    }

    public function scopeWithSchema(): Builder
    {
        return SchemalessAttributes::scopeWithSchemalessAttributes('schema');
    }
}
