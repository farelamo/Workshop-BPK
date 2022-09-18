<?php

namespace App\Services\Workshop;

use Alert;
use App\Models\Topic;
use App\Http\Requests\Workshop\TopicRequest;

class TopicService
{
    public function index()
    {
        return view('workshop.topic');
    }

    public function store(TopicRequest $request)
    {
        try {
            Topic::create($request->all());
            Alert::success('Success', 'Topic berhasil ditambahkan');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }

    public function update($id, TopicRequest $request)
    {
        try {
            $data = Topic::find($id);
            $data->update($request->all());
            Alert::success('Success', 'Topic berhasil diupdate');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            Topic::findOrFail($id)->delete();
            Alert::success('Success', 'Topic berhasil dihapus');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }
}

?>