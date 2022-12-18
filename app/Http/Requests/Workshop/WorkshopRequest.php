<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class WorkshopRequest extends FormRequest
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
            'image'                 => 'required|mimes:jpg,png,jpeg|max:2048',
            'document'              => 'required|mimes:pdf|max:10240',
            'date'                  => 'required|date',
            'link_id'               => 'required|exists:links,id',
            'topic_id'              => 'required|exists:topics,id',
            'target_audience_id'    => 'required|exists:target_audiences,id',
        ];
    }

    public function messages()
    {
       return [
            'title.required'                => 'judul harus diisi',
            'title.max'                     => 'judul maximal 200 character',
            'description.required'          => 'description harus diisi',
            'destination.required'          => 'destination harus diisi',
            'image.required'                => 'gambar harus diisi',
            'image.mimes'                   => 'gambar harus berupa jpg,png atau jpeg',
            'image.max'                     => 'batas maximum gambar adalah 2 MB',
            'document.required'             => 'document harus diisi',
            'document.mimes'                => 'document harus berupa pdf',
            'document.max'                  => 'batas maximum document adalah 10 MB',
            'date.required'                 => 'tanggal harus diisi',
            'date.date'                     => 'format tanggal salah',
            'link_id.required'              => 'sesi workshop harus dipilih',
            'link_id.exists'                => 'sesi belum tersedia',
            'topic_id.required'             => 'topic workshop harus dipilih',
            'topic_id.exists'               => 'topic belum tersedia',
            'target_audience_id.required'   => 'target audience harus dipilih',
            'target_audience_id.exists'     => 'target audience belum tersedia',
       ];
    }
}
