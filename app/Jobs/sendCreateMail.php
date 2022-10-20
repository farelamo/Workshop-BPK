<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendCreate;

class sendCreateMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $workshop;

    public function __construct($user, $workshop)
    {
        $this->user     = $user;
        $this->workshop = $workshop;
    }

    public function handle()
    {
        $email = new sendCreate($this->user, $this->workshop);
        Mail::to($this->user['email'])->send($email);
    }
}
