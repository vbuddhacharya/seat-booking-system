<?php

namespace App\Notifications;

use App\Data\TicketMailData;
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
    private ?TicketMailData $ticketData = null;
    /**
     * Create a new notification instance.
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
        $ticketData = new TicketMailData($ticket);
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
        $ticketData = new TicketMailData($this->ticket);

        return (new MailMessage)
            ->subject('Ticket Booked')
            ->greeting("Hello " . $this->ticket->user_name . ",")
            ->line(new HtmlString(Str::markdown(__('notifications.ticket_purchase.success', $ticketData?->toArray() ?? []))));
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
