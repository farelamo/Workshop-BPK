<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\failedWorkshop;
use App\Mail\successWorkshop;
use App\Models\Workshop;
use Log;

class failedJobWorkshop implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    { 
        $dateNow    = date("Y-m-d");
        $workshops  = Workshop::where('date', $dateNow)->get();

        if(count($workshops) > 0){
            foreach($workshops as $workshop){
                $emails = [];

                foreach ($workshop->users as $user) {
                    array_push($emails, $user->email);
                }
                Log::info($emails);

                if($workshop->total_audience > 15){
                    $email = new successWorkshop($workshop);
                    Mail::to(array_pop($emails))->cc($emails)->send($email);
                }

                if($workshop->total_audience <= 15){
                    $email = new failedWorkshop($workshop);
                    Mail::to(array_pop($emails))->cc($emails)->send($email);
                }
            }
        }
        
    }
}
