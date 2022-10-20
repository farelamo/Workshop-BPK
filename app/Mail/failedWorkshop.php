<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class failedWorkshop extends Mailable
{
    use Queueable, SerializesModels;

    protected $workshop;

    public function __construct($workshop)
    {
        $this->workshop = $workshop;
    }

    public function build()
    {
        $workshop = $this->workshop;
        $creator  = $workshop->users()->wherePivot('role', 'speaker')->first();
        return $this->view('Workshops.Emails.failedWorkshop', compact('workshop', 'creator'))->subject('[BPK] - Workshop H-1 Information');
    }
}
