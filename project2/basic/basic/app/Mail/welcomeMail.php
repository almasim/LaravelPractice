<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class welcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user=$user;
        
    }

    public function build()
    {
        return $this->view('emails.welcome-mail'); //view/emails/welcome-mail 
    }
}
//Register.php 
//Mail::to($this->email)->send(new welcomeMail($this->user));