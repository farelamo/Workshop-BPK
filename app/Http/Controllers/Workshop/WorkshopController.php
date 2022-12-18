<?php

namespace App\Http\Controllers\Workshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Workshop\WorkshopService;
use App\Http\Requests\Workshop\WorkshopRequest;
use App\Http\Requests\Workshop\WorkshopEditRequest;

class WorkshopController extends Controller
{
    public function __construct(WorkshopService $service)
    {
        $this->service = $service;
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        return $this->service->index($request);
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

    public function update($id, WorkshopEditRequest $request)
    {
        return $this->service->update($id, $request);
    }

    public function join($id)
    {
        return $this->service->join($id);
    }
}
