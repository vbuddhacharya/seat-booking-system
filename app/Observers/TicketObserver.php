<?php

namespace App\Observers;

use App\Enums\SeatStatus;
use App\Models\Ticket;
use App\Services\BookingService;

class TicketObserver
{

    public function creating(Ticket $ticket)
    {
        $service = new BookingService();
        $ticket->code = $service->getTicketCode();
    }

    /**
     * Handle the Ticket "created" event.
     */
    public function created(Ticket $ticket): void
    {
        $ticket->seat->update(['status' => SeatStatus::UNAVAILABLE->name]);
    }

    /**
     * Handle the Ticket "updated" event.
     */
    public function updated(Ticket $ticket): void
    {
        //
    }

    /**
     * Handle the Ticket "deleted" event.
     */
    public function deleted(Ticket $ticket): void
    {
        //
    }

    /**
     * Handle the Ticket "restored" event.
     */
    public function restored(Ticket $ticket): void
    {
        //
    }

    /**
     * Handle the Ticket "force deleted" event.
     */
    public function forceDeleted(Ticket $ticket): void
    {
        //
    }
}
