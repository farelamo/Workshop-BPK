<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'link' => 'required'
        ];
    }

    public function meesages(){
        return [
            'link.required' => 'Link harus diisi'
        ];
    }
}
