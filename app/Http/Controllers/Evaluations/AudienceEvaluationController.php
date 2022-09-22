<?php

namespace App\Http\Controllers\Evaluations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Evaluations\AudienceEvaluationService;

class AudienceEvaluationController extends Controller
{
    public function __construct(AudienceEvaluationService $service)
    {
        $this->service = $service;
    }

    public function index($id)
    {
        return $this->service->index($id);
    }

    public function store($id)
    {
        return $this->service->store($id);
    }
}
