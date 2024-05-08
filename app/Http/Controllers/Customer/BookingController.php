<?php

namespace App\Http\Controllers\Customer;

use App\Enums\SeatStatus;
use App\Models\TheatreSession;
use App\Models\Ticket;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Seat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(TheatreSession $theatreSession)
    {
        $seats = $theatreSession->seats()->where('status', SeatStatus::AVAILABLE->name)->pluck('number', 'id');
        $ticket = config('app.ticket_price');

        return view('bookings.create', compact('theatreSession', 'seats', 'ticket'));
    }

    public function store(StoreBookingRequest $request)
    {
        if (Seat::where('id', $request->seat_id)->where('status', SeatStatus::UNAVAILABLE)->exists()) {
            return redirect()->back()->with('error', 'Please try again');
        }

        $ticket = Ticket::create($request->validated());

        return view('bookings.show', compact('ticket'))->with('success', "Your ticket has been booked");
    }
}
