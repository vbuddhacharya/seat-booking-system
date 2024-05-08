<?php

namespace App\Notifications;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class TicketBooked extends Notification
{
    use Queueable;

    private $ticket;
    /**
     * Create a new notification instance.
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
        // $ticket->load('seat.theatreSession');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Ticket Booked')
            ->greeting("Hello " . $this->ticket->user_name.",")
            ->line(new HtmlString(Str::markdown(__('notifications.ticket_purchase.success', [
                'service_name' => "Tickets!",
                'ticket_code' => $this->ticket->code,
                'movie' => $this->ticket->seat->theatreSession->movie->name,
                'date' => $this->ticket->seat->theatreSession->date,
                'start_time' => $this->ticket->seat->theatreSession->start_time,
                'end_time' => $this->ticket->seat->theatreSession->end_time,
                'seat_number' => $this->ticket->seat->number
            ]))));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
