<?php

namespace App\Http\Controllers\Workshop;

use App\Http\Controllers\Controller;
use App\Services\Workshop\WorkshopService;
use App\Http\Requests\Workshop\WorkshopRequest;
use Log;

class WorkshopController extends Controller
{
    public function __construct(WorkshopService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function create()
    {
        return $this->service->create();
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function store(WorkshopRequest $request)
    {
        return $this->service->store($request);
    }

    public function update($id, WorkshopRequest $request)
    {
        return $this->service->update($id, $request);
    }
}
