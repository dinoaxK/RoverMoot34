<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationApproveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($participant)
    {
        $this->participant = $participant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Application Approved!')->markdown('emails.application-approve');
    }
}
