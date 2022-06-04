<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    public $body;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body, $subject)
    {
        $this->body = $body;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.email')
            ->with('body', $this->body)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject($this->subject);
    }
}
