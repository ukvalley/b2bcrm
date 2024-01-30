<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject('Registration Successful!')           
                     ->view('emails.test')
                     ->with([                       
                        'name'=> $this->name                   
                    ]);        

        return $mail;
        // return $this->view('emails.test'); // Assuming you have a corresponding blade view at resources/views/emails/test.blade.php
    }
}
