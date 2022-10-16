<?php

namespace App\Services\Workshop;

use Alert;
use App\Models\Workshop;
use App\Models\Topic;
use App\Models\Link;
use App\Models\TargetAudience;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\Workshop\WorkshopRequest;
use Log;

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

    public function filter($title, $topic, $link)
    {
        $data = Workshop::select(
                    'id', 'title', 'description', 'date', 
                    'link_id', 'total_audience', 'image'
                );
        
        if(!is_null($title) || !is_null($topic) || !is_null($link)){
            $data->whereRaw(
                (!is_null($title) ? "title LIKE '%" . $title . "%' ". (!is_null($topic) || !is_null($link) ? 'AND ' : '') : '') .
                (!is_null($topic) ? 'topic_id = ' . $topic . ' ' . (!is_null($link) ? 'AND ' : '') : '') .
                (!is_null($link)  ? 'link_id  = ' . $link : '')
            )->paginate(5);
        }
        return $data->paginate(5);
    }

    public function index(Request $request)
    {
        $topics     = Topic::select('id', 'name')->get();
        $links      = Link::select('id', 'link')->get();
        $workshops  = $this->filter($request->title, $request->topic_id, $request->link_id);
        
        return view('workshops.index', compact('workshops', 'topics', 'links'));
    }

    public function create()
    {
        $topics     = Topic::select('id', 'name')->get();
        $links      = Link::select('id', 'link')->get();
        $targets    = TargetAudience::select('id', 'name')->get();
        $checkDate  = $this->dateBooked();
        return view('Workshops.create', compact('checkDate', 'topics', 'links', 'targets'));
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

            $imageFile      = $request->file('image');
            $image          = time() . '-' . $imageFile->getClientOriginalName();
            Storage::putFileAs('public/images', $imageFile, $image);
            
            $documentFile   = $request->file('document');
            $document       = time() . '-' . $documentFile->getClientOriginalName();
            Storage::putFileAs('public/documents', $documentFile, $document);
            
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
                'target_audience_id' => $request->target_audience_id,
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
            $topics   = Topic::select('id', 'name')->get();
            $links    = Link::select('id', 'link')->get();

            $workshop = Workshop::findOrFail($id);
            $creator  = $workshop->users()->wherePivot('role', 'speaker')->first();

            $this->calculate_visited($workshop, true);
            
            return view('Workshops.detail', compact('workshop', 'creator', 'topics', 'links'));
        } catch (Exception $e) {
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function update($id, WorkshopRequest $request)
    {
        try {

            $workshop = Workshop::findOrFail($id);

            // if($request->hasFile()){

            $imageFile = $request->file('image');
            $image = $imageFile->getClientOriginalName();

            $documentFile = $request->file('document');
            $document = $documentFile->getClientOriginalName();

            // }
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
