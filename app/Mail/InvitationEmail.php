<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $invitationData;

    /**
     * Create a new message instance.
     *
     * @param array $invitationData
     */
    public function __construct(array $invitationData)
    {
        $this->invitationData = $invitationData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Invitation Email')
                    ->view('emails.invitation')
                    ->with('data', $this->invitationData);
    }
}
