<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;

class AuthController extends Controller
{
    public function __construct(AuthService $repository){
        $this->repository = $repository;
    }

    public function loginIndex()
    {
        return $this->repository->loginIndex();
    }

    public function login(Request $request)
    {
        return $this->repository->login($request);
    }

    public function logout()
    {
        return $this->repository->logout();
    }
}
