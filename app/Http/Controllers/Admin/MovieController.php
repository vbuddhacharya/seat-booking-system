<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function viewMovies(){
        $movies = Movie::all();
        return view('movies.index',compact('movies'));
    }
    public function storeMovie(StoreMovieRequest $request, MovieService $service){
        $request = $request->validated();
        if (key_exists('poster',$request))
            $imageName = $service->getPosterName($request['poster']); 
        else
            $imageName = "noimg.png";
        $movie = Movie::create([
            'name' => $request['name'],
            'poster' => $imageName,
            'genre' => $request['genre'],
            'release_date' => $request['release_date'],
            'imdb_id' => $request['imdb_id']
        ]);
        return redirect()->back()->with('success','Movie created successfully!');
    }
    public function editMovie($id){
        $movie = Movie::find($id);
        return view('movies.edit',compact('movie'));
    }
    
    public function updateMovie(StoreMovieRequest $request, $id,  MovieService $service){
        $request = $request->validated();
        $movie = Movie::find($id);
        $movie = $movie->fill([
            'name' => $request['name'],
            'genre' => $request['genre'],
            'release_date' => $request['release_date'],
            'imdb_id' => $request['imdb_id']
        ]);
        if(array_key_exists('poster', $request)){
            $imageName = $service->getPosterName($request['poster']);
            $movie->poster = $imageName;
        }
        $movie->save();
        return redirect()->route('admin.editmovie',$id)->with('success', 'Movie updated successfully!');
    }
    public function deleteMovie($id){
        $movie = Movie::destroy($id);
        return redirect()->back()->with('success','Movie deleted successfully!');
    }
}
