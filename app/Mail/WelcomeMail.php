<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(private string $title, private string $body)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to laracoding.com EmailDemo',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
            with: [
            'title' => $this->title,
            'body' => $this->body,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
