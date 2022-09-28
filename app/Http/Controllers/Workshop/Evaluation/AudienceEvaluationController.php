<?php

namespace App\Http\Controllers\Workshop\Evaluation;

use App\Http\Controllers\Controller;
use App\Services\Workshop\Evaluation\Audience;

class AudienceEvaluationController extends Controller
{
    public function __construct(Audience $service)
    {
        $this->service = $service;
    }

    public function show($id)
    {
        return $this->service->show($id);
    }
}
