<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;

class NewReservationAgent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var $offer
     */
    public $offer, $rooms, $user;

    /**
     * Create a new message instance.
     *
     * @param $offer
     * @return void
     */
    public function __construct(Offer $offer, int $rooms)
    {
        $user=Auth::user();
        $this->offer = $offer;
        $this->rooms = $rooms;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @param Offer $offer
     * @param int $rooms
     * @return $this
     */
    public function build()
    {
        return $this->view('emails/new_reservation_agent');
    }
}
