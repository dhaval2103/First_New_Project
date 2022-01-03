<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mail extends Mailable
{
    use Queueable, SerializesModels;
    public $details, $address;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $address)
    {
        $this->details = $details;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view = $this->details;
        $address = $this->address;
        return $this->view('billview', compact('view', 'address'));
    }
}