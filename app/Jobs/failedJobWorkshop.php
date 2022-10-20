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

class failedJobWorkshop implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $workshop;

    public function __construct($workshop)
    {
        $this->workshop = $workshop;
    }

    public function handle()
    {
        $email = new failedWorkshop($this->workshop);
        Mail::to($this->user['email'])->send($email);
    }
}
