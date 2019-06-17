<?php

namespace App\Traits;

use App\Form;

trait Formable
{
    public function getFormAttribute()
    {
        $type = $this->type;
        return Form::where('name', $type)->first();
    }

    public function getItemsAttribute()
    {
        return $this->getMetas() ?? collect();
    }

    public function createItems($metaParams)
    {
        $filtered = $this->filterParams($metaParams);
        $this->createMeta($filtered->toArray());
    }

    public function upsertItems($metaParams)
    {
        $filtered = $this->filterParams($metaParams);
        $this->setMeta($filtered->toArray());
    }

    public function filterParams($params) 
    {
        return $this->form->filterParams($params);
    }
}