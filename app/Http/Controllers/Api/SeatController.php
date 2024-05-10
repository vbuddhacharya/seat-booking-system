<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SeatResource;
use App\Models\Seat;
use App\Enums\SeatStatus;

class SeatController extends Controller
{
    public function availableSeats(string $id)
    {
        $seatCount = Seat::where('theatre_session_id', $id)->where('status', SeatStatus::AVAILABLE->name)->get();

        return SeatResource::collection($seatCount);
    }
}
