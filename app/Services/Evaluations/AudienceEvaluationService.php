<?php

namespace App\Services\Evaluations;

use PDF;
use Alert;
use Session;
use Exception;
use App\Models\Workshop;
use Illuminate\Http\Request;
use App\Traits\DownloadImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Evaluations\AudienceRequest;
use App\Http\Requests\Evaluations\AudienceEvaluationRequest;

class AudienceEvaluationService
{
    use DownloadImage;

    public function filter($title, $sortTitle, $sortSchedule)
    {
        $data = Auth::user()->audience_evaluations()
                ->when($sortSchedule, function($query, $sortSchedule){
                    return $query->orderBy('date', $sortSchedule);
                })
                ->when($sortTitle, function($query, $sortTitle){
                    return $query->orderBy('title', $sortTitle);
                })
                ->when($title, function($query, $title){
                    return $query->where('title', 'like', '%'. $title .'%');
                });

        return $data->paginate(5)->withQueryString();
    }

    public function index(Request $request)
    {
        $evaluations = $this->filter(
            $request->input('title'), 
            $request->input('sortTitle'), 
            $request->input('sortSchedule')
        );
        
        session()->put('fsearch', [
            'title'         => $request->input('title'),
            'sortTitle'     => $request->input('sortTitle'),
            'sortSchedule'  => $request->input('sortSchedule')
        ]);

        if(Session::has('fsearch')){
            $fsearch = Session::get('fsearch');
            return view('Workshops.Evaluations.audience', compact('evaluations', 'fsearch'));
        }

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

    public function view($id)
    {
        $data       = Auth::user()->audience_evaluations()
                                    ->wherePivot('workshop_id', $id)
                                    ->first();
        return view('Workshops.Certificate.AudienceCertificate', compact('data'));
    }

    public function download($id)
    {
        $data = Auth::user()->audience_evaluations()
            ->wherePivot('workshop_id', $id)
            ->first();

        $background = $this->base_image('assets/certificate/background-sertif.png');
        $pdf = PDF::loadview('Workshops.Download.AudienceCertificate', compact('data', 'background'));
        $pdf->setPaper('F4', 'landscape');
        $pdf->render();
        return $pdf->download('Sertikat-Workshop-Badiklat-BPK.pdf');
    }
}

?>