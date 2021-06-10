<?php

namespace App\Mail;

use App\Car;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCarNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $car;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($car)
    {
        $this -> car = $car;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.new-car-notify');
    }
}
