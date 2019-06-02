<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JusticeRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dyadicConflicts' => 'required_without_all'        
        ];
    }
}
