<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class ConfirmSubscription extends Mailable
{
    use Queueable, SerializesModels;
    public $folower;

    /**
     * Create a new message instance.
     */
    public function __construct($folower)
    {
        $this->folower = $folower;
    }

    public function build()
    {
        $url = route('blog.confirm', ['email' => $this->folower->email, 'id' => $this->folower->id]);
        return $this->view('emails.confirm_subscription')->with(['url' => $url, 'email' => $this->folower->email]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation d\'abonnement à la newsletter',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.confirm_subscription',
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
