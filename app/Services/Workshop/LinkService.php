<?php

namespace App\Services\Workshop;

use Alert;
use App\Models\Link;
use App\Http\Requests\Workshop\LinkRequest;

class LinkService
{
    public function index()
    {
        return view('workshop.link');
    }

    public function store(LinkRequest $request)
    {
        try {
            Link::create($request->all());
            Alert::success('Success', 'Link berhasil ditambahkan');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }

    public function update($id, LinkRequest $request)
    {
        try {
            $data = Link::find($id);
            $data->update($request->all());
            Alert::success('Success', 'Link berhasil diupdate');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            Link::findOrFail($id)->delete();
            Alert::success('Success', 'Link berhasil dihapus');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }
}

?>