<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewPost extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $unsubscribeUrl;

    /**
     * Create a new message instance.
     */

    public function __construct($post, $unsubscribeUrl)
    {
        $this->post = $post;
        $this->unsubscribeUrl = $unsubscribeUrl;
    }

    public function build()
    {
        return $this->view('emails.new_post')->with(['post' => $this->post, 'unsubscribeUrl' => $this->unsubscribeUrl]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvel article publié : ' . \Str::limit($this->post->title),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.new_post',
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
