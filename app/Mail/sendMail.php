<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;
    public $message;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $link, $message)
    {
        $this->user = $user;
        $this->link = $link;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if ($this->link == null) {
            return $this->subject($this->message)
                ->view('site.messageDocument', [
                    'user' => $this->user,
                ]);
        } else {
            return $this->subject($this->message)
                ->markdown('site.messageMail', [
                    'user' => $this->user,
                    'link' => $this->link,
                ]);
        }
    }
}
