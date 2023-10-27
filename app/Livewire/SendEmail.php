<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\SendTestEmail;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Component
{
    public $nom;
    public $emailAddress;
    public $subject;
    public $video;


    public function sendEmail()
    {
        Mail::to('test@example.com')->send(new SendTestEmail($this->nom, $this->emailAddress, $this->subject, $this->video));
        $this->nom = '';
        $this->emailAddress = '';
        $this->subject = '';
        $this->video = '';

        // Optionally, you can add a success message or other logic after sending the email
        // Add a success message
        session()->flash('success', 'L\'e-mail a été envoyé avec succès !');
    }


    public function render()
    {
        return view('livewire.send-email');
    }
}
