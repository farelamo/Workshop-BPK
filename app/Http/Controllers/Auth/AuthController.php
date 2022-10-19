<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;

class AuthController extends Controller
{
    public function __construct(AuthService $service){
        $this->service = $service;
        $this->middleware('auth')->only(['logout']);
    }

    public function loginIndex()
    {
        return $this->service->loginIndex();
    }

    public function login(Request $request)
    {
        return $this->service->login($request);
    }

    public function logout()
    {
        return $this->service->logout();
    }
}
