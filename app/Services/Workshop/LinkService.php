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
        $links = Link::select('id', 'link', 'sesi')->paginate(5);

        return view('Workshops.Link.index', compact('links'));
    }

    public function store(LinkRequest $request)
    {
        try {
            $check = Link::all();
            if($check->count() == 2){
                Alert::error('Maaf', 'Maximal hanya 2 link');
                return redirect()->back();
            }

            if(count($check) > 0){
                if($check->first()->sesi == $request->sesi) {
                    Alert::error('Maaf', 'Sesi sudah dipakai');
                    return redirect()->back();
                }
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

            $check = Link::where('id', '!=' , $data->id)->first();
            if($check->sesi == $request->sesiEdit) {
                Alert::error('Maaf', 'Sesi sudah dipakai');
                return redirect()->back();
            }

            $data->update([
                'link' => $request->linkEdit,
                'sesi' => $request->sesiEdit
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
            $data = Link::findOrFail($id);
            if (count($data->workshops) > 0){
                Alert::error('Maaf', 'Link masih digunakan workshop lain');
                return redirect()->back();
            }
            $data->delete();

            Alert::success('Success', 'Link berhasil dihapus');
            return redirect('/link');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }
}

?>