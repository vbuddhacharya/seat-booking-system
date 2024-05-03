<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Services\TMDBService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;


class ThirdPartyAPIController extends Controller
{

    public function index(TMDBService $service, Request $request)
    {
        $page = $request->query('page') ?? 1;
        $movieName = $request->query('movie') ?? null;
        $genreId = $request->query('genre') ?? null;

        $movies = $service->index($page, $genreId, $movieName);
        $genres = $service->getGenres();
        $pages = $service->getPages($movies['total_pages'], $page);

        return view('thirdparty.index', compact('movies', 'genres', 'pages', 'genreId', 'movieName'));
    }

    public function discover(TMDBService $service, Request $request)
    {
        $page = $request->query('page') ?? 1;
        $genreId = $request->query('genre') ?? null;

        $movies = $service->discover($page, $genreId);
        $genres = $service->getGenres();
        $pages = $service->getPages($movies['total_pages'], $page);

        return view('thirdparty.discover', compact('movies', 'genres', 'pages', 'genreId'));
    }
    public function show($movie)
    {
        $movieDetails = Http::withToken(config('services.tmdb.token'))
            ->get(
                'https://api.themoviedb.org/3/movie/' . $movie,
                ['append_to_response' => 'videos']
            )
            ->json();
        $movieDetails['year'] = Carbon::parse($movieDetails['release_date'])
            ->format('Y');

        return view('thirdparty.show', compact('movieDetails'));
    }

    public function store(TMDBService $service, Request $request)
    {
        // $movieDetails = Http::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/movie/' . $request->id)
        //     ->json();

        // $genres = collect($movieDetails['genres'])->mapWithKeys(function (array $item, int $key) {
        //     return [$item['id'] => $item['name']];
        // });

        // $genre = $genres->implode(',');
        // $name = $movieDetails['title'];
        // $release_date = $movieDetails['release_date'];
        

    }
}
