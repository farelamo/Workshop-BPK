<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendCreate extends Mailable
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
        // $data = [
        //     'name' => $name,
        //     'email' => $email,
        //     'order_code' => $order_code,
        //     'url_order' => $url_order,
        //     'payment_confirmation_date' => $paymentConfirmationDate,
        // ];
        return $this->view('Workshops.Emails.createWorkshop', compact('user', 'workshop'))->subject('[BPK] - Create Workshop Information');

    }
}
