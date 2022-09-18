<?php

namespace App\Services\Auth;

use Alert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function loginIndex()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        //send request + get return from SSO Auth

        // check response SSO Auth in database
        $user = User::where('NIP', '=', $request->NIP)->first();

        try {
            if (!$user) {
                $user = User::create([
                    'NIP'       => $request->NIP,
                    'fullname'  => $request->fullname,
                ]);
            }

            if($user->NIP === $request->NIP && $user->fullname === $request->fullname){
                Auth::login($user);
                Alert::success('Selamat datang ' . Auth::user()->fullname);
                return redirect('/');
            }
        } catch(Exception $e) {
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
