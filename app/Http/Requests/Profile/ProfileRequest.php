<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'unit'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'  => 'Email harus diisi',
            'email.email'     => 'Format email salah',
            'email.unique'    => 'Email sudah pernah terdaftar',
            'unit.required'   => 'Unit kerja harus diisi',
        ];
    }
}
