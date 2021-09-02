<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterVerifyLinkMail extends Mailable {
    use Queueable, SerializesModels;

    protected $link;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link, $user) {
        //
        $this->user = $user;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('email.register_verify_link')->with([
            "link" => $this->link,
            "user" => $this->user,
        ])->from(['address' => env("MAIL_FROM_ADDRESS"), 'name' => env("APP_NAME")]);
    }
}
