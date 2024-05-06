<?php

namespace App\Services;

use App\Enums\SeatStatus;
use App\Models\Movie;
use App\Models\Theatre;
use App\Models\Seat;
use Carbon\Carbon;
use App\Models\TheatreSession;
use Illuminate\Support\Facades\DB;

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
        $query = [];
        for ($i = 1; $i <= $capacity; $i++) {
            $query[] = ['number' => $i, 'theatre_session_id' => $theatreSession->id, 'status' => SeatStatus::AVAILABLE->name, 'created_at' => now(), 'updated_at' => now()];
        }
        $result = DB::table('seats')->insert($query);
        
        return $result;
    }
}
