<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;

use App\Services\Workshop\LinkService;
use App\Http\Requests\Workshop\LinkRequest;


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
        return $this->service->store($id, $request);
    }

    public function update($id, LinkRequest $request)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
