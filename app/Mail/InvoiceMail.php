<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfContent;

    public function __construct($pdfContent)
    {
        $this->pdfContent = $pdfContent;
    }

    public function build()
    {
        return $this->subject('Your Dynamic Invoice')
                    ->view('emails.invoice')
                    ->attachData($this->pdfContent, 'Invoice.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}