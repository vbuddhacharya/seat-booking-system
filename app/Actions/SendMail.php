<?php

namespace App\Actions;

use App\Models\Ticket;
use App\Notifications\TicketBooked;

class SendMail
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function handle(Ticket $ticket){
        $ticket->notify(new TicketBooked($ticket));
    }
}
