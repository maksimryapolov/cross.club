<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $client;
    public $phone;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->client = $data['client'];
        $this->message = $data['message'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.message', [
            'params' => [
                'user' => $this->client,
                'phone' => $this->phone,
                'email' => $this->email,
                'message' => $this->message

            ]
        ]);
    }
}
