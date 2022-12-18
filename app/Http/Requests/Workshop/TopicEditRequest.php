<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class TopicEditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'topikEdit' => 'required|max:100'
        ];
    }

    public function meesages(){
        return [
            'topikEdit.required' => 'Nama topic harus diisi',
            'topikEdit.max'      => 'Nama topic hanya 100 character'
        ];
    }
}
