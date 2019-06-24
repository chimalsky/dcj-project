<?php

namespace App;

use App\FormItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\SchemalessAttributes;

class Form extends Model
{
    protected $guarded = ['id'];

    public $casts = [
        'schema' => 'array',
    ];

    public function newItems()
    {
        return $this->belongsToMany(FormItem::class);
    }

    public function getItemsAttribute() 
    {
        $form = $this;

        return collect($this->schema->get('meta'))->map(function($itemArray) use ($form) {
            $item = new FormItem($itemArray);
            $item->form_id = $form->id;
            
            return $item;
        });
    }

    public function addItem(FormItem $formItem) 
    {        
        $schema = $this->schema->get('meta');
        $schema[] = $formItem->toArray();
        $this->schema->set('meta', $schema);
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

    public function getMarkup($model = null)
    {
        $form = $this;  

        return view('form.show', compact('form', 'model'));
    }
}
