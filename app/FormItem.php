<?php

namespace App;

use App\Form;
use Illuminate\Database\Eloquent\Model;

class FormItem extends Model
{
    protected $guarded = ['id'];

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id');
    }
}
