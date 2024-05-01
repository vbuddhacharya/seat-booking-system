<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class TMDBService
{
    
    // public function index($page,$genreId,$movieName)
    // {
    //     if ($movieName == null){
    //         $movies = Http::withToken(config('services.tmdb.token'))
    //         ->get("https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&sort_by=popularity.desc&", ['page' => $page, 'with_genres' => $genreId])
    //         ->json();
    //     }
    //     else{
    //         $movies = Http::withToken(config('services.tmdb.token'))
    //         ->get("https://api.themoviedb.org/3/search/movie&",['page' => $page, 'query' => $movieName])
    //         ->json();
    //     }
    //     // dd($movies);

    //     return $movies;
    // }
    public function index($page = 1, $genreId=0, $movieName){
        // dd($movieName);
        $movies = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/search/movie?include_adult=false&language=en-US&page=1",['query' => $movieName])
            ->json();
        // dd($movies);
        return $movies;
    }
    public function getGenres()
    {
        $allGenres = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/genre/movie/list")
            ->json()['genres'];

        $genres = collect($allGenres)->mapWithKeys(function (array $item, int $key) {
            return [$item['id'] => $item['name']];
        });
        return $genres;
    }
}
