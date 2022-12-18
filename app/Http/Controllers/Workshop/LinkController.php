<?php

namespace App\Http\Controllers\Workshop;

use App\Http\Controllers\Controller;

use App\Services\Workshop\LinkService;
use App\Http\Requests\Workshop\LinkRequest;
use App\Http\Requests\Workshop\LinkEditRequest;


class LinkController extends Controller
{
    public function __construct(LinkService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(LinkRequest $request)
    {
        return $this->service->store($request);
    }

    public function update($id, LinkEditRequest $request)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
