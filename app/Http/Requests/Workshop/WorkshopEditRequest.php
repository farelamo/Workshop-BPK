<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class WorkshopEditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|max:200',
            'description'           => 'required',
            'destination'           => 'required',
        ];
    }

    public function messages()
    {
       return [
            'title.required'                => 'judul harus diisi',
            'title.max'                     => 'judul maximal 200 character',
            'description.required'          => 'description harus diisi',
            'destination.required'          => 'destination harus diisi',
       ];
    }
}
