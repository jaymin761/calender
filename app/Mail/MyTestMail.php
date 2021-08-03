<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $emailinfo,$country,$state,$city;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailinfo,$country,$state,$city)
    {
        $this->emailinfo=$emailinfo;
        $this->country=$country;
        $this->state=$state;
        $this->city=$city;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('Testing Mail')
                ->view('mail.mailsend');
    }
}
