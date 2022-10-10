<?php

namespace App\Services\Workshop;

use Alert;
use App\Models\Workshop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Workshop\WorkshopRequest;

class WorkshopService
{

    public function error($kalimat){
        Alert::error('Maaf', $kalimat);
        return redirect()->back()->withInput();
    }

    public function dateBooked()
    {
        $dateNow    = strtotime(date("Y-m-d"));
        $dateStart  = date('Y-m-d', strtotime("+7 day", $dateNow));
        $dateEnd    = date('Y-m-d', strtotime("+21 day", $dateNow));

        return [
            'date_start' => $dateStart,
            'date_end' => $dateEnd,
        ];
    }

    public function calculate_visited($workshop, $increment){
        DB::Transaction(function() use(&$workshop, $increment){
            $workshop->update([
                'total_visited' => $increment ? $workshop->total_visited + 1 : $workshop->total_visited - 1
            ]);
        });
    }

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
                return $this->error('Jadwal Sudah Dibooking');
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
                'cancelled' => 'no',
                'link_id' => $request->link_id,
                'topic_id' => $request->topic_id,
            ]);
            $workshop->users()->attach(Auth::user()->id, ['role' => 'speaker']);

            Alert::success('Success', 'Workshop berhasil dibuat');
            return redirect('/workshop/' . $workshop->id);
        } catch (Exception $e) {
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function show($id)
    {
        try {

            $workshop = Workshop::findOrFail($id);
            $creator  = $workshop->users()->wherePivot('role', 'speaker')->first();

            $this->calculate_visited($workshop, true);
            
            return view('Workshops.detail', compact('workshop', 'creator'));
        } catch (Exception $e) {
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function update($id, WorkshopRequest $request)
    {
        try {

            $workshop = Workshop::findOrFail($id);

            $imageFile = $request->file('image');
            $image = $imageFile->getClientOriginalName();

            $documentFile = $request->file('document');
            $document = $documentFile->getClientOriginalName();

            $workshop = Workshop::update([
                'title'         => $request->title,
                'description'   => $request->description,
                'destination'   => $request->destination,
                'image'         => $image,
                'document'      => $document,
                'topic_id'      => $request->topic_id,
            ]);

            Alert::success('Success', 'Workshop berhasil diupdate');
            return redirect('/workshop/' . $id);
        } catch (Exception $e) {
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back()->withInput();
        }
    }

    public function join($id){
        try {

            $workshop = Workshop::findOrFail($id);

            if($workshop->total_audience == 80){
                return $this->error('Kuota Sudah Penuh');
            }

            $check = $workshop->users()->where('user_id', Auth::user()->id)->first();

            if(!empty($check)){
                if($check->pivot->role === 'audience'){
                    $this->calculate_visited($workshop, false);
                    return $this->error('Anda sudah mengikuti workshop ini');
                }

                if($check->pivot->role === 'speaker'){
                    $this->calculate_visited($workshop, false);
                    return $this->error('Speaker tidak bisa menjadi audience');
                }
            }

            $workshop->update([
                'total_audience' => $workshop->total_audience + 1
            ]);
            $workshop->users()->attach(Auth::user()->id, ['role' => 'audience']);

            Alert::success('Berhasil mengikuti workshop', 'Silahkan cek email yang terdaftar');
            return redirect('/workshop/'. $id);
        } catch (Exception $e) {
            $this->error('Terjadi Kesalahan');
        }
    }
}
