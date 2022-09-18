<?php

namespace App\Http\Controllers\Workshop;

use App\Http\Controllers\Controller;
use App\Service\Workshop\WorkshopService;
use App\Http\Requests\Workshop\WorkshopRequest;

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

    public function store(WorkshopRequest $request)
    {
        return $this->service->store($id, $request);
    }

    public function update($id, WorkshopRequest $request)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
