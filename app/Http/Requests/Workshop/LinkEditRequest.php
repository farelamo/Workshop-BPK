<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class LinkEditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'linkEdit' => 'required'
        ];
    }

    public function meesages(){
        return [
            'linkEdit.required' => 'Link harus diisi'
        ];
    }
}
