<?php

namespace App\Services\Profile;

use Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Profile\ProfileRequest;

class ProfileService
{
    public function index()
    {
        $user = Auth::user()->only('email', 'unit');
        return view('profile.index', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        try {

            $data = User::findOrFail(Auth::user()->id);
            $data->update($request->all());

            Alert::success('Success', 'Profile berhasil diupdate');
            return redirect()->back();
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }
}

?>