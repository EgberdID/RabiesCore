<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $cases; // tampung banyak kasus (collection)

    public function __construct($cases)
    {
        $this->cases = $cases;
    }

    public function build()
    {
        return $this->subject('Peringatan Kasus Rabies Tinggi')
                    ->markdown('emails.alert')
                    ->with([
                        'cases' => $this->cases,
                    ]);
    }
}
