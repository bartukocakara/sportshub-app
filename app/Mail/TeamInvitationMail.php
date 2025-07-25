<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeamInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $teamTitle;

    public function __construct(string $teamTitle)
    {
        $this->teamTitle = $teamTitle;
    }

    public function build(): self
    {
        return $this->subject(__('messages.team_invitation_subject', ['title' => $this->teamTitle]))
                    ->view('emails.team-invitation');
    }
}
