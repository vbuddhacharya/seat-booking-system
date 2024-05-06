<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;

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
}
