<?php

namespace App\Services\Evaluations;

use Alert;
use App\Models\Workshop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Evaluations\AudienceRequest;
use App\Http\Requests\Evaluations\AudienceEvaluationRequest;

class AudienceEvaluationService
{
    public function index()
    {
        $evaluations = Auth::user()->audience_evaluations()->paginate(5);
        return view('Workshops.Evaluations.audience', compact('evaluations'));
    }

    public function store(AudienceRequest $request, $id){
        try {

            $data   = Auth::user()->audience_evaluations()
                                    ->wherePivot('workshop_id', $id)
                                    ->first();
                                    
            $noteFile   = $request->file('note');
            $note       = time() . '-' . $noteFile->getClientOriginalName();
            Storage::putFileAs('public/evaluations/audience', $noteFile, $note);                    

            $data->audience_evaluations()->detach(Auth::user()->id);
            $data->audience_evaluations()->attach(Auth::user()->id, [
                'received'              => $request->received,
                'speaker_suggestion'    => $request->speaker_suggestion,
                'event_suggestion'      => $request->event_suggestion,
                'note'                  => $note,
            ]);

            Alert::success('Success', 'Silahkan download sertifikat anda');
            return redirect('workshop/evaluation/audience');
        }catch(Exception $e){
            
            Alert::error('Maaf', 'Terjadi Kesalahan');
            return redirect()->back()->withInput();
        }
    }
}

?>