<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class mail extends Mailable
{
    use Queueable, SerializesModels;
    public $views;
    public $address;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($views, $address)
    {
        $this->view = $views;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view = $this->view;
        $address = $this->address;
        return $this->view('billview', compact('view', 'address'));
    }
}