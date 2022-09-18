<?php

namespace App\Http\Controllers\Workshop;

use App\Http\Controllers\Controller;

use App\Service\Workshop\TopicService;
use App\Http\Requests\Workshop\TopicRequest;

class TopicController extends Controller
{
    public function __construct(TopicService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(TopicRequest $request)
    {
        return $this->service->store($id, $request);
    }

    public function update($id, TopicRequest $request)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
