<?php

namespace App\Services\Evaluations;

use Alert;
use App\Models\Workshop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Evaluations\SpeakerRequest;
use App\Http\Requests\Evaluations\SpeakerEvaluationRequest;

class SpeakerEvaluationService
{
    public function index()
    {
        $evaluations = Auth::user()->speaker_evaluations()->paginate(5);
        return view('Workshops.Evaluations.speaker', compact('evaluations'));
    }

    public function store(SpeakerRequest $request, $id){
        try {

            $data   = Auth::user()->speaker_evaluations()
                                    ->wherePivot('workshop_id', $id)
                                    ->first();
                                    
            $File   = $request->file('file');
            $file       = time() . '-' . $noteFile->getClientOriginalName();
            Storage::putFileAs('public/evaluations/speaker', $File, $file);                    

            $data->speaker_evaluations()->detach(Auth::user()->id);
            $data->speaker_evaluations()->attach(Auth::user()->id, [
                'comfortable'           => $request->comfortable,
                'event_suggestion'      => $request->event_suggestion,
                'file'                  => $file,
            ]);

            Alert::success('Success', 'Silahkan download sertifikat anda');
            return redirect('workshop/evaluation/speaker');
        }catch(Exception $e){
            
            Alert::error('Maaf', 'Terjadi Kesalahan');
            return redirect()->back()->withInput();
        }
    }
}

?>