<?php

namespace App\Services;

use App\Models\Movie;
use App\Models\Theatre;
use Carbon\Carbon;


class TheatreSessionService
{
    public function getMovies()
    {
        $movies = Movie::all();
        foreach ($movies as $movie) {
            $movie->year = Carbon::parse($movie['release_date'])->format('Y');
        }

        $movies = $movies->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name'] . " " . $item['year']];
        });
        return $movies;
    }

    public function getTheatres()
    {
        $theatres = Theatre::all();

        $theatres = $theatres->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        return $theatres;
    }

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
