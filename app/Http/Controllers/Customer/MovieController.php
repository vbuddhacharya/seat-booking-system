<?php

namespace App\Http\Controllers\Customer;

use App\Enums\SeatStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\TheatreSession;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $theatreSessions = TheatreSession::select('movie_id')
            ->where('date', '>=', Carbon::now()->format('Y-m-d'))
            ->where('start_time', '>=', Carbon::now()->format('H:i:s'))
            ->where('seats.status', SeatStatus::AVAILABLE->name)
            ->join('seats', 'seats.theatre_session_id', '=', 'theatre_sessions.id')
            ->distinct()
            ->paginate(10);

        return view('index', compact('theatreSessions'));
    }

    public function show(Movie $movie)
    {
        $movie->load([
            'theatreSessions' => fn ($q) => $q->orderBy('date')
                ->with('theatre')
                ->withCount([
                    'seats' => fn ($q) => $q->where('status', SeatStatus::AVAILABLE)
                ])
        ]);

        return view('customers.movies.show', compact('movie'));
    }
}
