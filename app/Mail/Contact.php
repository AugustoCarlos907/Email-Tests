<?php

namespace App\Mail;

use Faker\Provider\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    
    //construtor que inicializa a classe
    public function __construct(public array $data)
    {
        
    }

    /**
     * Get the message envelope.
     */

    //assunto do email
    public function envelope(): Envelope
    {
        return new Envelope(
            // from: new Address ($this->data['email']),
            subject: $this->data['subject'],
        );
    }

    /**
     * Get the message content definition.
     */

    //conteudo do email
    public function content(): Content
    {
        return new Content(
            view: 'contentEmail',
        );
    }

    
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */

    //anexos do email`
    public function attachments(): array
    {
        return [];
    }
}
