<?php

namespace App\Data;

use App\Models\Ticket;
use Carbon\Carbon;
use DateTime;
use Spatie\LaravelData\Data;

class TicketMailData extends Data
{
    /**
     * Create a new class instance.
     */
    public string $movieName;
    public string $ticketCode;
    public string $date;
    public string $startTime;
    public string $endTime;
    public int $seatNumber;
    public string $serviceName;

    public function __construct(
        Ticket $ticket
    ) {
        $this->movieName =  $ticket->seat->theatreSession->movie->name;
        $this->ticketCode = $ticket->code;
        $this->date = $ticket->seat->theatreSession->date;
        $this->startTime = $ticket->seat->theatreSession->start_time;
        $this->endTime = $ticket->seat->theatreSession->end_time;
        $this->seatNumber = $ticket->seat->number;
        $this->serviceName = config('app.name');
    }
}
