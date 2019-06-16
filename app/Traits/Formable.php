<?php

namespace App\Traits;

use App\Form;
use Zoha\Metable;

trait Formable
{
    use Metable {
        createMeta as protected traitCreateMeta;
    }

    public function getFormAttribute()
    {
        $type = $this->type;
        return Form::where('name', $type)->first();
    }

    public function getMetaAttribute()
    {
        return $this->getMetas();
    }

    public function createMeta($metaParams)
    {
        $filtered = $this->filterParams($metaParams);
        $this->traitCreateMeta($filtered->toArray());
    }

    public function upsertMeta($metaParams)
    {
        $filtered = $this->filterParams($metaParams);
        $this->setMeta($filtered->toArray());
    }

    public function filterParams($params) 
    {
        return $this->form->filterParams($params);
    }
}