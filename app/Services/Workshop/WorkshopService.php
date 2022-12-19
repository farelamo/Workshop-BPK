<?php

namespace App\Services\Workshop;

use Alert;
use Exception;
use Carbon\Carbon;
use App\Models\Link;
use App\Models\Topic;
use App\Models\Workshop;
use App\Jobs\sendCreateMail;
use App\Jobs\sendJoinMail;
use Illuminate\Http\Request;
use App\Models\TargetAudience;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Workshop\WorkshopRequest;
use App\Http\Requests\Workshop\WorkshopEditRequest;

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
                )->when($title, function ($query, $title) {
                    return $query->where('title', 'like', '%'. $title .'%');
                })
                ->when($topic, function ($query, $topic) {
                    return $query->where('topic_id', $topic);
                })
                ->when($link, function ($query, $link) {
                    return $query->where('link_id', $link);
                });
                
        return $data->orderBy('date','desc')->paginate(5)->withQueryString();
    }

    public function index(Request $request)
    {
        try {

            $topics     = Topic::select('id', 'name')->get();
            $links      = Link::select('id', 'link')->get();
            $workshops  = $this->filter($request->title, $request->topic_id, $request->link_id);
            
            session()->flashInput($request->input());
            return view('workshops.index', compact('workshops', 'topics', 'links'));
        }catch(Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function create()
    {
        try {

            $topics     = Topic::select('id', 'name')->get();
            $links      = Link::select('id', 'link', 'sesi')->get();
            $targets    = TargetAudience::select('id', 'name')->get();
            $checkDate  = $this->dateBooked();
            
            return view('Workshops.create', compact('checkDate', 'topics', 'links', 'targets'));
        }catch(Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function store(WorkshopRequest $request)
    {
        $checkDate = $this->dateBooked();

        $dateBooked = Workshop::where('date', '>=', $checkDate['date_start'])
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
            $workshop->speaker_evaluations()->attach(Auth::user()->id);

            dispatch(new sendCreateMail([
                    'email'     => Auth::user()->email,
                    'fullname'  => Auth::user()->fullname,
                ], $workshop)
            );

            Alert::success('Success', 'Workshop berhasil dibuat');
            return redirect('/workshop/' . $workshop->id);
        } catch (Exception $e) {
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function show($id)
    {
        
        $workshop = Workshop::findOrFail($id);
        try {
            $topics   = Topic::select('id', 'name')->get();
            $links    = Link::select('id', 'link')->get();

            $creator   = $workshop->users()->wherePivot('role', 'speaker')->first();
            $audiences = $workshop->users()->wherePivot('role', 'audience')->paginate(5);

            // dd($audiences);

            $this->calculate_visited($workshop, true);
            
            return view('Workshops.detail', compact('workshop', 'creator', 'topics', 'links', 'audiences'));
        } catch (Exception $e) {
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function update($id, WorkshopEditRequest $request)
    {
        try {

            $workshop = Workshop::findOrFail($id);

            $workshop->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'destination'   => $request->destination,
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

            $workshop   = Workshop::findOrFail($id);

            $dateNow    = date("Y-m-d");
            $overApply  = date('Y-m-d', strtotime($workshop->date));

            if($dateNow >= $overApply){
                return $this->error('Pendaftaran Sudah Tutup');
            }

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
            $workshop->audience_evaluations()->attach(Auth::user()->id);

            dispatch(new sendJoinMail([
                    'email'     => Auth::user()->email,
                    'fullname'  => Auth::user()->fullname,
                ], $workshop)
            );

            Alert::success('Berhasil mengikuti workshop', 'Silahkan cek email yang terdaftar');
            return redirect('/workshop/'. $id);
        } catch (Exception $e) {
            $this->error('Terjadi Kesalahan');
        }
    }
}
