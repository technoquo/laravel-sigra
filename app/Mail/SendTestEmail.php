<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTestEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $nom;
    public $emailAddress;
    public $subject;
    public $video;

    public function __construct($nom, $emailAddress, $subject, $video)
    {
        $this->nom = $nom;
        $this->emailAddress = $emailAddress;
        $this->subject = $subject;
        $this->video = $video;
    }

    public function build()
    {
        return $this->view('emails.test-email');
    }
}
