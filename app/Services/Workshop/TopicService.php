<?php

namespace App\Services\Workshop;

use Alert;
use App\Models\Topic;
use App\Http\Requests\Workshop\TopicRequest;
use App\Http\Requests\Workshop\TopicEditRequest;

class TopicService
{
    public function index()
    {
        $topics = Topic::select('id', 'name')->paginate(5);
        return view('Workshops.Topic.index', compact('topics'));
    }

    public function store(TopicRequest $request)
    {
        try {
            Topic::create($request->all());
            
            Alert::success('Success', 'Topic berhasil ditambahkan');
            return redirect('/topic');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }

    public function update($id, TopicEditRequest $request)
    {
        try {
            $data = Topic::find($id);
            $data->update([
                'name' => $request->topikEdit
            ]);
            
            Alert::success('Success', 'Topic berhasil diupdate');
            return redirect('/topic');
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
            return redirect('/topic');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }
}

?>