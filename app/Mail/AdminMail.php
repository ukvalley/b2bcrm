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

    public $agentuser;
    public $institutionUsers;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($agentUsers,$institutionUsers)
    {
        $this->agentuser = $agentUsers;
        $this->institutionUsers = $institutionUsers;
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
                        'agentuser'=> $this->agentuser,
                        'institutionUsers'=> $this->institutionUsers                        
                    ]);        

        return $mail;
    }
}
