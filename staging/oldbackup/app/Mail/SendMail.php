<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $msg;
   

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$msg)
    {
        $this->name = $name;
        $this->msg = $msg;
        
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Naukriyan')->view('SendMail/sendmail');
    }
}
