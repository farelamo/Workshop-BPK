<?php

namespace App\Services\Evaluations;

use Alert;
use Exception;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Evaluations\SpeakerRequest;
use App\Http\Requests\Evaluations\SpeakerEvaluationRequest;

class SpeakerEvaluationService
{
    public function filter($title, $sortTitle, $sortSchedule)
    {
        $data = Auth::user()->speaker_evaluations()
                ->when($title, function($query, $title){
                    return $query->where('title', 'like', '%'. $title .'%');
                })
                ->when($sortTitle, function($query, $sortTitle){
                    return $query->orderBy('title', $sortTitle);
                })
                ->when($sortSchedule, function($query, $sortSchedule){
                    return $query->orderBy('date', $sortSchedule);
                });
        // dd($data->toSql());

        return $data->paginate(5)->withQueryString();
    }

    public function index(Request $request)
    {
        $evaluations = $this->filter(
            $request->input('title'), 
            $request->input('sortTitle'), 
            $request->input('sortSchedule')
        );
        
        session()->flashInput($request->input());
        return view('Workshops.Evaluations.speaker', compact('evaluations'));
    }
    public function store(SpeakerRequest $request, $id){
        try {

            $data       = Auth::user()->speaker_evaluations()
                                    ->wherePivot('workshop_id', $id)
                                    ->first();
                                    
            $File       = $request->file('file');
            $filename   = time() . '-' . $File->getClientOriginalName();
            Storage::putFileAs('public/evaluations/speaker', $File, $filename);                    

            $data->speaker_evaluations()->detach(Auth::user()->id);
            $data->speaker_evaluations()->attach(Auth::user()->id, [
                'comfortable'           => $request->comfortable,
                'event_suggestion'      => $request->event_suggestion,
                'file'                  => $filename,
            ]);

            Alert::success('Success', 'Silahkan download sertifikat anda');
            return redirect('workshop/evaluation/speaker');
        }catch(Exception $e){
            
            Alert::error('Maaf', 'Terjadi Kesalahan');
            return redirect()->back()->session()->flashInput($request->input());
        }
    }
}

?>