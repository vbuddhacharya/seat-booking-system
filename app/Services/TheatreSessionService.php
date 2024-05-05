<?php

namespace App\Services;

use App\Models\Movie;
use App\Models\Theatre;
use Carbon\Carbon;


class TheatreSessionService
{

    public function correctTime($start, $end)
    {
        $startTime = Carbon::parse($start);
        $endTime = Carbon::parse($end);
        if ($startTime->diffInMinutes($endTime) < 0) {
            return false;
        }
        return true;
    }
}
