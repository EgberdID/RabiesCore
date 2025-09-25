<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AlertEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $case; // properti untuk data kasus

    public function __construct($case)
    {
        $this->case = $case; // assign data kasus ke properti
    }

    public function build()
    {
        return $this->subject('Peringatan Kasus Rabies Tinggi')
                    ->markdown('emails.alert'); // template markdown
    }
}