<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\successAudienceWorkshop;
use App\Mail\successSpeakerWorkshop;
use App\Mail\failedWorkshop;
use App\Models\Workshop;

class prepareJobWorkshop implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    { 
        $dateNow      = strtotime(date("Y-m-d"));
        $dateConvert  = date('Y-m-d', strtotime("+1 day", $dateNow));
        $workshops    = Workshop::where('date', $dateConvert)->get();

        if(count($workshops) > 0){
            foreach($workshops as $workshop){
                $emails = [];

                if($workshop->total_audience > 15){
                    foreach ($workshop->users as $user) {
                        if($user->pivot->role == 'speaker'){
                            $email = new successSpeakerWorkshop($workshop);
                            Mail::to($user->email)->send($email);
                        }
                        
                        if($user->pivot->role != 'speaker') {
                            array_push($emails, $user->email);
                        }
                    }
                    
                    $email = new successAudienceWorkshop($workshop);
                    Mail::to(array_pop($emails))->cc($emails)->send($email);
                }

                if($workshop->total_audience <= 15){
                    foreach ($workshop->users as $user) {
                        array_push($emails, $user->email);
                    }
                    $email = new failedWorkshop($workshop);
                    Mail::to(array_pop($emails))->cc($emails)->send($email);
                }
            }
        }
        
    }
}
