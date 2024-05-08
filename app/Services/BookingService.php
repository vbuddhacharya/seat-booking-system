<?php

namespace App\Services;

use App\Models\Ticket;
use Illuminate\Support\Str;

class BookingService
{
    public function getTicketCode()
    {
        $length = config('app.ticket_code_length');
        do {
            $code = Str::random($length);
        } while (Ticket::where('code', $code)->exists());

        return $code;
    }
}
