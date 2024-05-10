<?php

namespace App\Jobs;

use App\Actions\SendMail;
use App\Notifications\TicketBooked;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Ticket;


class SendTicket implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Ticket $ticket
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(SendMail $mail): void
    {
        $mail->handle($this->ticket);
    }
}
