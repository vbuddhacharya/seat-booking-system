<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class TMDBService
{

    public function discover($page, $genreId = 0)
    {
        $movies = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&sort_by=popularity.desc&", ['page' => $page, 'with_genres' => $genreId])
            ->json();

        return $movies;
    }
    public function index($page, $genreId, $movieName)
    {
        $movies = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/search/movie?include_adult=false&language=en-US", ['page' => $page, 'query' => $movieName])
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
        // dd($genres);
        return $genres;
    }

    public function getPages($totalPages, $page)
    {
        $pagesNum = 5;
        $pages = [];
        $minPage = $page - $pagesNum;
        $maxPage = $page + $pagesNum;
        $maxPage = ($maxPage > $totalPages) ? $totalPages : $maxPage;
        for ($i = $minPage; $i <= $maxPage; $i++) {
            if ($i < 1 || $i > 500)
                continue;
            $pages[] = $i;
        }

        return $pages;
    }
}
