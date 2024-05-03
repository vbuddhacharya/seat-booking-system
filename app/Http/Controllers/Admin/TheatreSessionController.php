<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTheatreSessionRequest;
use App\Models\Movie;
use App\Models\Theatre;
use App\Models\TheatreSession;
use App\Services\TheatreSessionService;
use Illuminate\Http\Request;

class TheatreSessionController extends Controller
{
    public function index()
    {
        $theatreSessions = TheatreSession::orderByRaw("FIELD(status,'Running','Upcoming','Completed')")->orderBy('date')->paginate(10);

        return view('theatreSessions.index', compact('theatreSessions'));
    }

    public function create(TheatreSessionService $service)
    {
        $movies = $service->getMovies();
        $theatres = $service->getTheatres();

        return view('theatreSessions.create', compact('movies', 'theatres'));
    }

    public function store(StoreTheatreSessionRequest $request)
    {
        // dd($request->validated());
        $theatreSession = TheatreSession::create($request->validated());

        return redirect()->route('admin.theatre-sessions.index')->with('success', 'Theatre Session created successfully');
    }

    public function edit(TheatreSession $theatreSession, TheatreSessionService $service)
    {
        $movies = $service->getMovies();
        $theatres = $service->getTheatres();
        return view('theatreSessions.edit', compact('theatreSession', 'movies', 'theatres'));
    }

    public function update(StoreTheatreSessionRequest $request, TheatreSession $theatreSession)
    {
        $theatreSession->update($request->validated());

        return redirect()->route('admin.theatre-sessions.index')->with('success', 'Theatre Session updated successfully!');
    }

    public function destroy(TheatreSession $theatreSession)
    {
        $theatreSession->delete();

        return redirect()->route('admin.theatre-sessions.index')->with('success', 'Theatre Session deleted successfully');
    }
}
