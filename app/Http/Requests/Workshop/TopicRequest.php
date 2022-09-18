<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100'
        ];
    }

    public function meesages(){
        return [
            'name.required' => 'Nama topic harus diisi',
            'name.max'      => 'Nama topic hanya 100 character'
        ];
    }
}
