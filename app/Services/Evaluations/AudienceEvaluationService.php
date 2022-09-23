<?php

namespace App\Services\Evaluations;

use Alert;
use App\Models\Workshop;
use App\Models\AudienceEvaluation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Evaluations\AudienceEvaluationRequest;

class AudienceEvaluationService
{
    public function index($id)
    {
        $anjay = Auth::user()->audience_evaluations->where('workshop_id', $id);
        dd($anjay);
        
        $result = [];
        foreach(Auth::user()->audience_evaluations as $audience){
            $data = [];
            $data['received']       = $audience->pivot->received;
            $data['note']           = $audience->pivot->note;
            $data['workshop_id']    = $audience->pivot->workshop_id;
            array_push($result, $data);
        }
        dd($result);
    }

    public function store($id){

        $workshop = Workshop::find($id);
       
        $workshop->audience_evaluations()->attach(Auth::user()->id, [
            'received'              => 'test received',
            'speaker_suggestion'    => 'test speaker suggestion',
            'event_suggestion'      => 'test event suggestion',
            'note'                  => 'test note',
        ]);

        return $this->index($id);
    }
}

?>