<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendJoin extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $workshop;

    public function __construct($user, $workshop)
    {
        $this->user     = $user;
        $this->workshop = $workshop;
    }


    public function build()
    {
        $user       = $this->user; 
        $workshop   = $this->workshop; 

        return $this->view('Workshops.Emails.joinWorkshop', compact('user', 'workshop'))->subject('[BPK] - Register Workshop Information');
    }
}
