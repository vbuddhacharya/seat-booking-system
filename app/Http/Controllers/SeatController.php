<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeatRequest;
use Illuminate\Http\Request;
use App\Models\Seat;
use App\Models\TheatreSession;
use App\Enums\SeatStatus;
use App\Http\Resources\SeatResource;

class SeatController extends Controller
{
    public function create()
    {
        return view('seats.create');
    }

    public function index($theatreSession)
    {
        $seats = Seat::where('theatre_session_id', $theatreSession)->paginate(10);
        return view('seats.index', compact('seats'));
    }

    public function edit(TheatreSession $theatreSession, Seat $seat)
    {
        $statuses = collect(SeatStatus::cases())->reduce(function ($carry, $value) {

            $carry = $carry->merge([
                $value->name => $value->getLabel()
            ]);

            return $carry;
        }, collect());

        return view('seats.edit', compact('theatreSession', 'seat', 'statuses'));
    }

    public function update(StoreSeatRequest $request, TheatreSession $theatreSession, Seat $seat)
    {
        $seat->update($request->validated());

        return redirect()->route('admin.seats.index', $seat->theatre_session_id)->with('success', 'Seat updated successfully!');
    }

    public function availableSeats(string $id)
    {
        $seatCount = Seat::where('theatre_session_id', $id)->where('status', SeatStatus::AVAILABLE->name)->get();

        return SeatResource::collection($seatCount);
    }
}
