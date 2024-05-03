@props([
    'current' => null,
    'pages' => null,
    'route' => Route::current()->getName(),
    'genreId' => null,
    'movieName' => null,
])

<div class="bg-purple-200 p-1 rounded-lg max-w-max m-auto mt-3">
    @if (!($current == 1))
        <a href="{{ route($route, ['page' => $current - 1, 'genre' => $genreId, 'movie' => $movieName]) }}"
            class="py-1 px-2 rounded-lg hover:bg-purple-300 ">Prev</a>
    @endif

    @foreach ($pages as $page)
        <a href="{{ route($route, ['page' => $page, 'genre' => $genreId, 'movie' => $movieName]) }}"
            @class([
                'bg-primary' => $page === $current,
                ' rounded-lg py-1 px-3 hover:bg-purple-300',
            ])>{{ $page }}</a>
    @endforeach

    @if (!($current == 500 || last($pages) == 1))
        <a href="{{ route($route, ['page' => $current + 1, 'genre' => $genreId, 'movie' => $movieName]) }}"
            class="py-1 px-2 rounded-lg hover:bg-purple-300">Next</a>
    @endif

</div>
