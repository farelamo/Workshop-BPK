<?php

namespace App\Http\Requests\Evaluations;

use Illuminate\Foundation\Http\FormRequest;

class AudienceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'received'             => 'required|max:500' ,
            'speaker_suggestion'   => 'required|max:500',
            'event_suggestion'     => 'required|max:500',
            'note'                 => 'required|mimes:pdf|max:10240',
        ];
    }

    public function messages(){
        return [
            'received.required'             => 'pembaharuan harus diisi',
            'received.max'                  => 'maksimal pembaharuan adalah 500 karakter',
            'speaker_suggestion.required'   => 'saran pembicara harus diisi',
            'speaker_suggestion.max'        => 'maksimal saran pembicara adalah 500 karakter',
            'event_suggestion.required'     => 'saran acara harus diisi',
            'event_suggestion.max'          => 'maksimal saran acara adalah 500 karakter',
            'note.required'                 => 'catatan harus diisi',
            'note.max'                      => 'file catatan harus kurang dari 10 mb',
            'note.mimes'                    => 'file catatan harus berupa PDF',
        ];
    }
}
