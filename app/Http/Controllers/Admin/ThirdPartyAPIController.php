<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TMDBService;
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
        $pagesNum = 5;
        $pages = [];
        $minPage = $page - $pagesNum;
        $maxPage = $page + $pagesNum;
        for ($i = $minPage; $i <= $maxPage; $i++) {
            if ($i < 1 || $i > 500)
                continue;
            $pages[] = $i;
        }
        // dd($movies);
        return view('thirdparty.index', compact('movies', 'genres', 'pages', 'genreId', 'movieName'));
    }

    public function show($movie)
    {
        
    }

    public function create()
    {
    }
}
