<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\TheatreSession;
use Carbon\Carbon;

class MovieController extends Controller
{
    public function index(){
        $theatreSession = TheatreSession::where('date','>=', Carbon::now()->format('Y-m-d'))->where('start_time','>=', Carbon::now()->format('H:i:s'))->paginate(10);
        return view('index', compact('theatreSession'));
    }
}
