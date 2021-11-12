<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShareRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $have_currency;
    public $can_buy;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $have_currency, $can_buy)
    {
        $this->name = $name;
        $this->email = $email;
        $this->have_currency = $have_currency;
        $this->can_buy = $can_buy;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.share_request')->with([
            'name' => $this->name,
            'email' => $this->email,
            'have_currency' => $this->have_currency,
            'can_buy' => $this->can_buy,
        ]);
    }
}
