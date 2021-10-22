<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $emails;
    public function __construct($emails)
    {
        $this->emails=$emails;
    }
   
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Hi user your Booking is Confirmed Enjoy Ride')->view('booking.bookingconfirmemail')->with('emails',$this->emails);
    }
}
