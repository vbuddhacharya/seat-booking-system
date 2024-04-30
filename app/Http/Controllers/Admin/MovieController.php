<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return view('movies.index', compact('movies'));
    }

    public function store(StoreMovieRequest $request, MovieService $service)
    {
        $movie = Movie::create([
            'name' => $request['name'],
            'poster' => $request->has('poster') ?
                $service->getPosterName($request->poster) : "noimg.png",
            'genre' => $request['genre'],
            'release_date' => $request['release_date'],
            'imdb_id' => $request['imdb_id']
        ]);

        return redirect()->route('admin.movies.edit', $movie)->with('success', 'Movie created successfully!');
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(StoreMovieRequest $request, Movie $movie,  MovieService $service)
    {
        $movie = DB::transaction(function () use ($movie, $request, $service) {
            $movie->update($request->validated());

            if ($request->has('poster')) {
                $imageName = $service->getPosterName($request['poster']);
                $movie->poster = $imageName;
                $movie->save();
            }

            return $movie;
        });


        return redirect()->route('admin.movies.edit', $movie)->with('success', 'Movie updated successfully!');
    }

    public function delete(Movie $movie)
    {
        $movie->delete();

        return redirect()->back()->with('success', 'Movie deleted successfully!');
    }
}
