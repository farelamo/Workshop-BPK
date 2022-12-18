<?php

namespace App\Services\Workshop;

use Alert;
use App\Models\Link;
use App\Http\Requests\Workshop\LinkRequest;
use App\Http\Requests\Workshop\LinkEditRequest;

class LinkService
{
    public function index()
    {
        $links = Link::select('id', 'link')->paginate(5);

        return view('Workshops.Link.index', compact('links'));
    }

    public function store(LinkRequest $request)
    {
        try {
            $check = Link::count();
            if($check <= 2){
                Alert::error('Maaf', 'Maximal hanya 2 link');
                return redirect()->back();
            }

            Link::create($request->all());

            Alert::success('Success', 'Link berhasil ditambahkan');
            return redirect('/link');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }

    public function update($id, LinkEditRequest $request)
    {
        try {
            $data = Link::find($id);
            $data->update([
                'link' => $request->linkEdit
            ]);

            Alert::success('Success', 'Link berhasil diupdate');
            return redirect('/link');
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
            return redirect('/link');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }
}

?>