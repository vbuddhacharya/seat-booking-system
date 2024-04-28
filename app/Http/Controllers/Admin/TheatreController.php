<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TheatreController extends Controller
{
    public function viewTheatres(){
        return view('theatres.index');
    }
}
