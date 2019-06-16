<?php

namespace App\Traits;

use App\Form;
use Zoha\Metable;

trait Formable
{
    use Metable;

    public function getFormAttribute()
    {
        $type = $this->type;
        return Form::where('name', $type)->first();
    }

    public function getMetaAttribute()
    {
        return $this->getMetas();
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