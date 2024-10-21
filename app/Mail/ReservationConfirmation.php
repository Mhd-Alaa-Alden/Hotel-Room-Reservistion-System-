<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->markdown('emails.reservation-confirmation')
            ->subject('Room Booked Successfully');
    }
}
