<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $usertype;
    public $toEmail;
    public $mobile_number;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$usertype,$toEmail,$mobile_number)
    {
        $this->name = $name;
        $this->usertype = $usertype;
        $this->toEmail = $toEmail;
        $this->mobile_number =$mobile_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()//Registration Successful!
    {
        $mail = $this->subject('New User Registered Successful!')           
                     ->view('emails.admin')
                     ->with([                       
                        'name'=> $this->name,  
                        'usertype'=> $this->usertype,                 
                        'toEmail'=> $this->toEmail,
                        'mobile_number'=> $this->mobile_number,
                    ]);        

        return $mail;
    }
}
