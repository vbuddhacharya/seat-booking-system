<?php

namespace App\Http\Controllers;

use App\Enums\SeatStatus;
use App\Models\TheatreSession;
use App\Models\User;
use App\Http\Requests\StoreBookingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(TheatreSession $theatreSession)
    {
        $seats = $theatreSession->seats()->where('status', SeatStatus::AVAILABLE->getLabel())->pluck('number', 'id');
        $ticket = config('app.ticket_price');
        return view('bookings.create', compact('theatreSession', 'seats', 'ticket'));
    }

    public function store(StoreBookingRequest $request)
    {
        dd($request);
    }
}
