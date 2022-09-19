<?php

namespace App\Services\Workshop;

use Alert;
use App\Models\Workshop;
use App\Http\Requests\Workshop\WorkshopRequest;

class WorkshopService
{
    public function index()
    {
        // return view('workshop.index');]
        return view('yuhu');
    }

    public function store(WorkshopRequest $request)
    {
        try {
            Workshop::create($request->all());
            Alert::success('Success', 'Workshop berhasil ditambahkan');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        try {
            $workshop = Workshop::find($id);
            $workshop->total_visited += 1;
            $workshop->update(['total_visited' => $workshop->total_visited]);
            return view('anjay', compact('workshop'));
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }

    public function update($id, WorkshopRequest $request)
    {
        try {
            $workshop = Workshop::find($id);
            $workshop->update($request->all());
            Alert::success('Success', 'Workshop berhasil diupdate');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            Workshop::findOrFail($id)->delete();
            Alert::success('Success', 'Workshop berhasil dihapus');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }
}

?>