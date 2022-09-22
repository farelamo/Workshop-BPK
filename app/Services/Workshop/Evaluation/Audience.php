<?php

namespace App\Services\Workshop\Evaluation;

use Alert;
use App\Models\AudienceEvaluation;
use Illuminate\Support\Facades\Auth;
// use App\Http\Requests\Profile\ProfileRequest;

class Audience
{
    public function show()
    {
        $audience = AudienceEvaluation::where('user_id', Auth::user()->id);
        dd($audience->user);

        // dd();
    }

    // public function update(ProfileRequest $request)
    // {
        // try {

        //     $data = User::findOrFail(Auth::user()->id);
        //     $data->update($request->all());

        //     Alert::success('Success', 'Profile berhasil diupdate');
        //     return redirect()->back();
        // } catch(Exception $e){
        //     Alert::error('Maaf', 'terjadi kesalahan');
        //     return redirect()->back();
        // }
    // }
}

?>