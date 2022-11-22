<?php

namespace App\Http\Controllers\Evaluations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Evaluations\SpeakerRequest;
use App\Services\Evaluations\SpeakerEvaluationService;

class SpeakerEvaluationController extends Controller
{
    public function __construct(SpeakerEvaluationService $service)
    {
        $this->service = $service;
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return $this->service->index($request);
    }

    public function store(SpeakerRequest $request, $id)
    {
        return $this->service->store($request, $id);
    }

    public function view($id)
    {
        return $this->service->view($id);
    }

    public function download($id)
    {
        return $this->service->download($id);
    }
}
