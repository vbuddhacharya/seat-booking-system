<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TheatreSession;
use Illuminate\Http\Request;

class TheatreSessionController extends Controller
{
    public function index(){
        $theatreSessions = TheatreSession::orderByRaw("FIELD(status,'Running','Upcoming','Completed')")->orderBy('date')->paginate(10);

        return view('theatreSessions.index',compact('theatreSessions'));
    }
}
