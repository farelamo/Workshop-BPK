<?php

namespace App\Services\Auth;

use Alert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthService
{

    public function loginIndex()
    {
        return Socialite::driver('keycloak')->scopes(['profile'])->redirect();
    }

    public function login()
    {
        try {

            $response  = Socialite::driver('keycloak')->stateless()->user();
            
            $data      = $response->getRaw()['info'];
            $user      = User::updateOrCreate([
                'fullname'  => $data['NamaLengkap'],
                'NIP'       => $data['NIP'],
                'new_NIP'   => $data['NIPBaru'],
                'email'     => $data['Email'],
                'unit'      => $data['NamaUnitKerja'],
            ]);

            Auth::login($user);
            return redirect('/');
        } catch(Exception $e) {

            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        Alert::success('success', 'Anda berhasil logout');
        return redirect(Socialite::driver('keycloak')->getLogoutUrl(url('/')));
    }
}
