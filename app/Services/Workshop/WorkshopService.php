<?php

namespace App\Services\Workshop;

use Alert;
use App\Models\Workshop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Workshop\WorkshopRequest;
use Log;

class WorkshopService
{
    public function index()
    {
        // return view('workshop.index');
        return view('yuhu');
    }

    public function store(WorkshopRequest $request)
    {
        $dateBooked = Workshop::where('date', );

        try {

            if ($request->hasFile('image') && $request->hasFile('document')) {
                $imageFile      = $request->file('image');
                $image          = $imageFile->getClientOriginalName();

                $documentFile   = $request->file('document');
                $document       = $documentFile->getClientOriginalName();
                
                $workshop = Workshop::create([
                    'title'         => $request->title,
                    'description'   => $request->description,
                    'destination'   => $request->destination,
                    'date'          => $request->date,
                    'image'         => $image,
                    'document'      => $document,
                    'link_id'       => $request->link_id,
                    'topic_id'      => $request->topic_id,
                ]);
                $workshop->users()->attach(Auth::user()->id, ['role' => 'speaker']);
            }

            Alert::success('Success', 'Workshop berhasil ditambahkan');
            return redirect('/workshop');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        try {
            $workshop = Workshop::find($id);

            DB::beginTransaction();
                $workshop->total_visited += 1;
                $workshop->update(['total_visited' => $workshop->total_visited]);
            DB::commit();

            return view('Workshops.anjay', compact('workshop'));
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }

    public function update($id, WorkshopRequest $request)
    {
        try {
            if ($request->hasFile('image') && $request->hasFile('document')) {
                $imageFile      = $request->file('image');
                $image          = $imageFile->getClientOriginalName();

                $documentFile   = $request->file('document');
                $document       = $documentFile->getClientOriginalName();
                
                $workshop = Workshop::update([
                    'title'         => $request->title,
                    'description'   => $request->description,
                    'destination'   => $request->destination,
                    'image'         => $image,
                    'document'      => $document,
                    'link_id'       => $request->link_id,
                    'topic_id'      => $request->topic_id,
                ]);
            }
            
            Alert::success('Success', 'Workshop berhasil diupdate');
            return redirect('/workshop');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }

    
}

?>