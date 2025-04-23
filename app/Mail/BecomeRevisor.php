<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class BecomeRevisor extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user; // l’utente che ha fatto richiesta di diventare revisore
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope // viene utilizzata per impostare le informazioni sull'intestazione di posta elettronica per la mail da inviare
    {
        return new Envelope(
            subject: "Rendi revisore l'utente" . $this->user->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content // stabiliamo il contenuto della mail
    {
        return new Content(
            view: 'mail.become-revisor',
        );
    }

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
