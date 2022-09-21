<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Services\Profile\ProfileService;
use App\Http\Requests\Profile\ProfileRequest;

class ProfileController extends Controller
{
    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function update(ProfileRequest $request)
    {
        return $this->service->update($request);
    }
}
