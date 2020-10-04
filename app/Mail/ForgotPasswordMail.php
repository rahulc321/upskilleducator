<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\URL;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user, $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $type)
    {
        $this->user = $user;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = URL::temporarySignedRoute('reset-password', Carbon::now()->addHours(24), ['user' => $this->user->uuid, 'type' => $this->type]);
        $this->user->url = $url;
        $data['user'] = $this->user;
        return $this->markdown('emails.forgot-password.index', $data)
            ->subject('Reset Password');
    }
}
