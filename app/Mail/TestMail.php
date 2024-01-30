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
    public $email;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email = null, $password = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
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
                        'name'=> $this->name,
                        'email' => $this->email,
                        'password' => $this->password                   
                    ]);        

        return $mail;
        // return $this->view('emails.test'); // Assuming you have a corresponding blade view at resources/views/emails/test.blade.php
    }
}
