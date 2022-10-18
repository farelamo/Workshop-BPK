<?php

namespace App\Http\Requests\Evaluations;

use Illuminate\Foundation\Http\FormRequest;

class SpeakerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comfortable'          => 'required|max:500' ,
            'event_suggestion'     => 'required|max:500',
            'file'                 => 'required|mimes:pdf|max:10240',
        ];
    }

    public function messages(){
        return [
            'comfortable.required'          => 'field ini harus diisi',
            'comfortable.max'               => 'maksimal pengisian adalah 500 karakter',
            'event_suggestion.required'     => 'saran acara harus diisi',
            'event_suggestion.max'          => 'maksimal saran acara adalah 500 karakter',
            'file.required'                 => 'file materi harus diisi',
            'file.max'                      => 'file materi harus kurang dari 10 mb',
            'file.mimes'                    => 'file materi harus berupa PDF',
        ];
    }
}
