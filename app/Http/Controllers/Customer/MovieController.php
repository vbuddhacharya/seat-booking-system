<?php

namespace App\Http\Controllers\Customer;

use App\Enums\SeatStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\TheatreSession;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $theatreSession = TheatreSession::select('movie_id')->where('date', '>=', Carbon::now()->format('Y-m-d'))->where('start_time', '>=', Carbon::now()->format('H:i:s'))->distinct()->paginate(10);

        return view('index', compact('theatreSession'));
    }

    public function show(Movie $movie)
    {
        $theatreSessions = $movie->theatreSessions()->orderBy('date')->get();

        foreach ($theatreSessions as $theatreSession) {
            $theatreSession->start_time = Carbon::parse($theatreSession->start_time)->format('H:i');
            $theatreSession->end_time = Carbon::parse($theatreSession->end_time)->format('H:i');
            $theatreSession->available = $theatreSession->seats()->where('status', SeatStatus::AVAILABLE->name)->count();
        }

        return view('customers.movies.show', compact('movie', 'theatreSessions'));
    }
}
