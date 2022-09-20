<?php

namespace App\Services\Workshop;

use Alert;
use App\Http\Requests\Workshop\WorkshopRequest;
use App\Models\Workshop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkshopService
{
    public function index()
    {
        return view('yuhu');
    }

    public function create()
    {
        $checkDate = $this->dateBooked();
        return view('Workshops.create', compact('checkDate'));
    }

    public function store(WorkshopRequest $request)
    {
        $checkDate = $this->dateBooked();

        $dateBooked = Workshop::where('date', '>', $checkDate['date_start'])
            ->where('date', '<=', $checkDate['date_end'])
            ->get()->map->only('date', 'link_id');

        foreach ($dateBooked as $booked) {
            if ($booked['date'] == $request->date && $booked['link_id'] == $request->link_id) {
                Alert::error('Maaf', 'Jadwal sudah dibooking');
                return redirect()->back()->withInput();
            }
        }

        try {

            $imageFile = $request->file('image');
            $image = $imageFile->getClientOriginalName();

            $documentFile = $request->file('document');
            $document = $documentFile->getClientOriginalName();

            $workshop = Workshop::create([
                'title' => $request->title,
                'description' => $request->description,
                'destination' => $request->destination,
                'date' => $request->date,
                'image' => $image,
                'document' => $document,
                'link_id' => $request->link_id,
                'topic_id' => $request->topic_id,
            ]);
            $workshop->users()->attach(Auth::user()->id, ['role' => 'speaker']);

            Alert::success('Success', 'Workshop berhasil ditambahkan');
            return redirect('/workshop');
        } catch (Exception $e) {
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back()->withInput();
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
        } catch (Exception $e) {
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back()->withInput();
        }
    }

    public function update($id, WorkshopRequest $request)
    {
        try {

            $workshop = Workshop::find($id);

            $imageFile = $request->file('image');
            $image = $imageFile->getClientOriginalName();

            $documentFile = $request->file('document');
            $document = $documentFile->getClientOriginalName();

            $workshop = Workshop::update([
                'title' => $request->title,
                'description' => $request->description,
                'destination' => $request->destination,
                'image' => $image,
                'document' => $document,
                'topic_id' => $request->topic_id,
            ]);

            Alert::success('Success', 'Workshop berhasil diupdate');
            return redirect('/workshop');
        } catch (Exception $e) {
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back()->withInput();
        }
    }

    public function dateBooked()
    {
        $dateNow = strtotime(date("Y-m-d"));
        $dateStart = date('Y-m-d', strtotime("+7 day", $dateNow));
        $dateEnd = date('Y-m-d', strtotime("+14 day", $dateNow));

        return [
            'date_start' => $dateStart,
            'date_end' => $dateEnd,
        ];
    }
}
