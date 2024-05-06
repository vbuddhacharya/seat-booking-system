<?php

namespace App\Services;

use App\Models\Movie;
use App\Models\Theatre;
use App\Models\Seat;
use Carbon\Carbon;
use App\Models\TheatreSession;



class TheatreSessionService
{

    public function isCorrectTime($start, $end)
    {
        $startTime = Carbon::parse($start);
        $endTime = Carbon::parse($end);
        if ($startTime->diffInMinutes($endTime) < 0) {
            return false;
        }
        return true;
    }

    public function isValidRange($data)
    {
        $theatreSession = TheatreSession::where('date', $data['date'])
            ->where('theatre_id', $data['theatre_id'])
            ->where('start_time', '<=', $data['end_time'])
            ->where('end_time', '>=', $data['start_time'])
            ->count();
        if ($theatreSession > 0) {
            return false;
        }
        return true;
    }

    public function createSeats(TheatreSession $theatreSession)
    {
        $capacity = $theatreSession->theatre->capacity;
        for ($i = 1; $i <= $capacity; $i++) {
            $seat = new Seat();
            $seat->number = $i;
            $seat->theatre_session_id = $theatreSession->id;
            $seat->status = "Available";
            $seat->save();
        }
    }
}
