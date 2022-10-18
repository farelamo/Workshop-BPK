<?php

namespace App\Http\Controllers\Evaluations;

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

    public function index()
    {
        return $this->service->index();
    }

    public function store(SpeakerRequest $request, $id)
    {
        return $this->service->store($request, $id);
    }
}
