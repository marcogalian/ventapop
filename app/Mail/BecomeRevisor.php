<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BecomeRevisor extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->from('ventapop.revisor@noreply.com')->view('mail.become-revisor');
    }

    /**
     * Get the message envelope.
     */
    /* public function envelope()
    {
        return new Envelope(
            subject: 'Become Revisor',
        );
    } */

    /**
     * Get the message content definition.
     */
    /* public function content()
    {
        return new Content(
            view: 'view.name',
        );
    } */

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
